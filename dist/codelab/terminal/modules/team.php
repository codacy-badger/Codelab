<?php



	$command = $_POST['command'];
	$command = trim($command," ");
	$commands = explode(' ' , $command);

    // #########################################
    // ## ME
    // #########################################
    if (count($commands) == 1 AND $commands[0] == 'me'):

        $param = array(
            'table' => 'clTeam',
            'where' => 'email="' . $_SESSION['teamLogin'] . '" OR username = "' . $_SESSION['teamLogin'] . '"',
            'limit' => 1,
             'order' => 'id',
             'sort' => 'asc'
        );

        $results = sql::get($param);
        $answer = array();

        foreach ($results as $key => $value):
            array_push($answer, '<span>' . $key . '</span>');
            if ($value == ''):
                array_push($answer, '&nbsp');
            else:
                array_push($answer, $value);
            endif;

        endforeach;


        answer($answer);
    endif;

	// #########################################
    // ## LIST
    // #########################################
    if (count($commands) == 1 AND $commands[0] == 'list'):

        $param = array(
            'table' => 'clTeam',
			'columns' => '*',
             'order' => 'email',
             'sort' => 'asc'
        );

        $results = sql::get($param);
        $answer = array();

        foreach ($results as $key => $value):
			array_push($answer, '<span>' . $value['email'] . '</span>');
			array_push($answer, "id: " . $value['id'] . ", username: " . $value['username']);
        endforeach;

        answer($answer);
    endif;

    // #########################################
    // ## CREATE
    // #########################################
    if ($commands[0] == 'create'):

        if (count($commands) == 1):
            $answer = array(
        		"No required parameters",
        		"Type in format <b>create [email*] [username] [password]</b>",
        	);
        	answer($answer);
        endif;
        if (count($commands) == 2 OR count($commands) == 3 OR count($commands) == 4):



                if (!clValid::email($commands[1])):
                    $answer = array(
                        "Email address <b>" . $commands[1] . "</b> is not valid"
                    );
                    answer($answer);
                endif;

                $param = array(
        		  'table' => 'clTeam',
        		  'columns' => array('id', 'username', 'email', 'password', 'active'),
        		  'where' => '(email="' . sql::str($commands[1]) . '")',
        		  'limit' => 1,
        		);

        		$results = sql::get($param);
                if (count($results) != 0):
                    $answer = array(
                        "User email <b>" . $commands[1] . "</b> already registered"
                    );

                    answer($answer);
                endif;

                if (count($commands) == 3):
                    // Validate alphanumeric
                    if (!preg_match('/^[a-zA-Z]+[a-zA-Z0-9._]+$/', $commands[2])) {
                        $answer = array(
                            "Username <b>" . $commands[1] . "</b> is not valid"
                        );
                        answer($answer);
                    }


                    // Check if username empty
                        if ($commands[2] == ''):
                            $answer = array(
                                "Username is empty"
                            );
                            answer($answer);
                        endif;
                    // Check username length max
                        if (strlen($commands[2]) > registry::get('username.length.max', 18)):
                            $answer = array(
                                "Username <b>" . $commands[2] . "</b> too long"
                            );
                            answer($answer);
                        endif;
                    // Check username length min
                        if (strlen($commands[2]) < registry::get('username.length.min', 4)):
                            $answer = array(
                                "Username <b>" . $commands[2] . "</b> too short"
                            );
                            answer($answer);
                        endif;


                endif;

                if (count($commands) == 3):
                    // Validate alphanumeric
                    if (!preg_match('/^[a-zA-Z]+[a-zA-Z0-9._]+$/', $commands[2])) {
                        $answer = array(
                            "Username <b>" . $commands[2] . "</b> is not valid"
                        );
                        answer($answer);
                    }
                endif;


                if (count($commands) == 4):
                    $password = $commands[3];
                endif;




                    $answer = array(
                        "Account created",
                        "Team account <b>" . $commands[1] . "</b> created"
                    );

                    answer($answer);
                
            endif;


    endif;
