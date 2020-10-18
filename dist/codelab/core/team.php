<?php


class team {
    
    public static function data($id = null){
        if (auth::check()):
            $param = array(
                'table' => 'clTeam',
                'where' => 'id="' . auth::id() . '"',
                'limit' => 1,
                 'order' => 'id',
                 'sort' => 'asc'
            );
            $results = sql::get($param);
            return $results;
        else:
            return false;
        endif;

    }

    public static function access($id = null){
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
//  public static function passwordCreate($password){
//      return crypto::in(password_hash($password, PASSWORD_DEFAULT));
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
