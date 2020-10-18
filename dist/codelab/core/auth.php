<?php

class auth {

    // $user = username or email

    private static function createAuthLog($status, $note)
    {
        $insert = array(
            'status' => $status,
            'created' => date("Y-m-d H:i:s"),
            'ip' => spy::ip(),
            'os' => spy::os(),
            'browser' => spy::browser(),
            'note' => $note,
        );
        sql::insert('clLogsAuth', $insert);
    }


    private static function tokenCreate($id){
        $token = array(
            'TeamId' => $id,
            'SessionId' =>  session_id(),
            'Datetime' => date("Y-m-d H:i:s")
        );
        $token = json_encode($token);
        $token = crypto::in($token);
        sql::update('clTeam', 'id="' . $id . '"', array('authToken' => $token));
        session::set('authToken', $token);
    }


    public static function id(){
        $token = session::get('authToken');
        $token = crypto::out($token);
        $token = json_decode($token, true);
        return $token['TeamId'];
    }



    public static function destroy(){
        sql::update('clTeam', 'id = "' . auth::id() . '"', array('authToken' => ''));
        session::delete('authToken');
    }

    private static function loginFailed($message, $type = 'warning'){
        auth::createAuthLog(false, $message);
        $return = array(
            'status' => false,
            'noty' => $type,
            'message' =>  engine::translation($message, 'uf'),
        );
        return $return;
    }

    public static function login($user, $password){



        // Check if user exists
        $paramAuthDown = array(
            'table' => 'clLogsAuth',
            'columns' => array('ip', 'created', 'note'),
            'where' => 'ip="' . spy::ip() . '" AND created < (CURRENT_TIMESTAMP - INTERVAL ' .   registry::get('auth.down.time', 10) . ' MINUTE)',
            'limit' => registry::get('auth.down.max', 10),
            'order' => 'id',
        	    'sort' => 'desc'
        );
        $resultsAuthDown = sql::get($paramAuthDown);
        $bypass = false;
        if (count($resultsAuthDown)  ==  registry::get('auth.down.max', 10)):
            foreach ($resultsAuthDown as $key => $value):
                if (strtolower($value['note']) == 'logged'):
                    $bypass = true;
                endif;
            endforeach;
            if ($bypass == false):
                return auth::loginFailed('access blocked', 'error');
            endif;
        endif;



        // Check if username empty
            if ($user == ''):
                return auth::loginFailed('username empty');
            endif;
        // Check username length max
            if (strlen($user) > registry::get('username.length.max', 18)):
                return auth::loginFailed('username too long');
            endif;
        // Check username length min
            if (strlen($user) < registry::get('username.length.min', 4)):
                return auth::loginFailed('username too short');
            endif;
        // Check if password empty
            if ($password == ''):
                return auth::loginFailed('password empty');
            endif;
        // Check password length max
            if (strlen($password) > registry::get('password.length.max', 120)):
                return auth::loginFailed('password too long');
            endif;
        // Check password length min
            if (strlen($password) < registry::get('password.length.min', 6)):
                return auth::loginFailed('password too short');
            endif;
        // Check if user exists
            $param = array(
              'table' => 'clTeam',
              'columns' => array('id', 'username', 'email', 'password', 'active'),
              'where' => 'username="' . sql::str($user) . '" OR email="' . sql::str($user) . '"',
              'limit' => 1,
            );
            $results = sql::get($param);
            if (empty($results)):
                return auth::loginFailed('User account not found');
            else:
                if (@$results['active'] != '1'):
                    return auth::loginFailed('Account disabled');
                endif;

                if (@$results['id'] != ''):
                    // Get user id
                    $userID = $results['id'];
                    // Logged
                    if (password_verify($password,crypto::out(@$results['password']))):
                        auth::tokenCreate($userID);
                        auth::createAuthLog(true, 'logged');
                        $return = array(
                            'status' => true,
                            'noty' => 'success',
                            'message' =>  engine::translation('logged', 'uf'),
                        );
                        return $return;
                    else:
                        return auth::loginFailed('password incorrect');
                    endif;
                else:
                    return auth::loginFailed('User id not found');
                endif;

            endif;
        // Check if password match
        return false;
    }


    public static function check(){
        $token = session::get('authToken');
        $tokenDecode = crypto::out($token);
        $tokenDecode = json_decode($tokenDecode, true);

        if (!is_numeric(@$tokenDecode['TeamId'])):
            return false;
        endif;

        // Check if user exists
        $param = array(
              'table' => 'clTeam',
              'columns' => array('id', 'authToken', 'active'),
              'where' => 'id="' . sql::str($tokenDecode['TeamId']) . '"',
              'limit' => 1,
        );
        $results = sql::get($param);
        if (empty($results)):
            return false;
        endif;
        if (@$token == '' OR @$results['authToken'] == '' OR @$token !=  @$results['authToken'] OR @$results['active'] != '1'):
            return false;
        endif;

        $dateCheck = strtotime(date("Y-m-d H:i:s")) - strtotime($tokenDecode['Datetime']);
        if ($dateCheck > registry::get('auth.timeout', 300)):
            return false;
        endif;
        // Renew token
        auth::tokenCreate($tokenDecode['TeamId']);
        return true;
    }



//  private static function tokenCreate($id){
//      return crypto::in($id . session_id());
//  }
//  private static function sessionCreate($id){
//      $_SESSION[SESSION]['user'] = array();
//      $_SESSION[SESSION]['user']['id'] = crypto::in($id);
//      $_SESSION[SESSION]['user']['token']['hash'] = auth::tokenCreate($id);
//      $_SESSION[SESSION]['user']['token']['created'] = date('Y-m-d H:i:s');
//      $_SESSION[SESSION]['user']['token']['updated'] = date('Y-m-d H:i:s');
//  }
//  public static function id(){
//      return crypto::out($_SESSION[SESSION]['user']['id']);
//  }

//  public static function check(){

//      if (!isset($_SESSION[SESSION]['user'])):
//          return false;
//      endif;
//      if (!isset($_SESSION[SESSION]['user']['id'])):
//          return false;
//      endif;
//      if (!isset($_SESSION[SESSION]['user']['token']['hash'])):
//          return false;
//      endif;
//      $id = crypto::out($_SESSION[SESSION]['user']['id']);

//      if (!is_numeric($id)):
//          return false;
//      endif;

//      //if ($id != auth::tokenCreate($id)):
//      //    return false;
//      //endif;
//      $_SESSION[SESSION]['user']['token']['updated'] = date('Y-m-d H:i:s');
//      return true;
//  }

//  public static function logout(){
//      unset($_SESSION[SESSION]['user']);
//  }
//  public static function login($login, $password, $json = false){



//      // Check no active
//      $query = 'SELECT * FROM `' . CONFIG['database']['prefix'] . '_users` WHERE email="'. $login . '" AND active = 0 LIMIT 1';
//      $result = sql::query($query);
//      if (sql::counter($query) == 1){
//          $response = array(
//              'status' => 'error',
//              'message' => "account inactive"
//          );
//          if ($json == true):
//              return json_encode($response);
//          else :
//              return $response;
//          endif;
//      }



//      $query = 'SELECT * FROM `' . CONFIG['database']['prefix'] . '_users` WHERE email="'. $login . '" LIMIT 1';

//      $result = sql::query($query);
//      if (sql::counter($query) == 0){
//          $response = array(
//              'status' => 'error',
//              'message' => "login invalid"
//          );
//          if ($json == true):
//              return json_encode($response);
//          else :
//              return $response;
//          endif;
//      }

//      foreach($result as $row)
//      {
//          if (!password_verify($password,crypto::out($row['password']))):
//              $response = array(
//                  'status' => 'error',
//                  'message' => 'password invalid'
//              );
//              if ($json == true):
//                  return json_encode($response);
//              else :
//                  return $response;
//              endif;
//          endif;

//          auth::sessionCreate($row['id']);
//          $response = array(
//              'status' => 'success'
//          );
//          if ($json == true):
//              return json_encode($response);
//          else :
//              return $response;
//          endif;
//      }
//  }
}
