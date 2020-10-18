<?php
/*

	 ██████╗ ██████╗  ██████╗██╗  ██╗    ██████╗ ███████╗██╗   ██╗    ████████╗███████╗ █████╗ ███╗   ███╗
	██╔════╝ ╚════██╗██╔════╝██║ ██╔╝    ██╔══██╗██╔════╝██║   ██║    ╚══██╔══╝██╔════╝██╔══██╗████╗ ████║
	██║  ███╗ █████╔╝██║     █████╔╝     ██║  ██║█████╗  ██║   ██║       ██║   █████╗  ███████║██╔████╔██║
	██║   ██║ ╚═══██╗██║     ██╔═██╗     ██║  ██║██╔══╝  ╚██╗ ██╔╝       ██║   ██╔══╝  ██╔══██║██║╚██╔╝██║
	╚██████╔╝██████╔╝╚██████╗██║  ██╗    ██████╔╝███████╗ ╚████╔╝        ██║   ███████╗██║  ██║██║ ╚═╝ ██║
	 ╚═════╝ ╚═════╝  ╚═════╝╚═╝  ╚═╝    ╚═════╝ ╚══════╝  ╚═══╝         ╚═╝   ╚══════╝╚═╝  ╚═╝╚═╝     ╚═╝

	 Project name: PHP Backdoor
	 Description: Web-based application that allows to execute terminal commands on a server directly from a browser
	 Authors: Jarek <jarek@g3ck.com>, G3ck Dev Team <dev@g3ck.com
	 Github: https://g3ck.github.io/PHP-Backdoor
	 License: MIT
*/
$clAjax = true;
include('../codelab.php');
	if (!isset($_SESSION['team'])):
		$_SESSION['team'] = null;
	endif;
	if (!isset($_SESSION['teamLogin'])):
		$_SESSION['teamLogin'] = null;
	endif;
	if (!isset($_SESSION['teamLogin'])):
		$_SESSION['mod'] = null;
	endif;

// decode answer array
function answer($data){
	        $data = array_reverse ($data);
	die(json_encode($data));
}

// Get current command
// if command posted
if (isset( $_POST['command'])):
	if ($_POST['command'] == 'logout'):
		$_SESSION['team'] = null;
		$_SESSION['teamLogin'] = null;
		$answer = array(
			"Loggoed out",
			"Enter your username or email address",
		);
		answer($answer);
	endif;



	if ($_SESSION['team'] == null AND @$_SESSION['teamLogin'] == null):

		$login = $_POST['command'];

		$param = array(
		  'table' => 'clTeam',
		  'columns' => array('id', 'username', 'email', 'password', 'active'),
		  'where' => 'username="' . sql::str($login) . '" OR email="' . sql::str($login) . '"',
		  'limit' => 1,
		);
		$results = sql::get($param);
		if (empty($results)):
			$answer = array(
				"User <b>" . $login . "</b> not found",
			);
			answer($answer);
		else:
			$_SESSION['teamLogin'] = $login;
			$answer = array(
				"Enter password for <b>" . $login . "</b> account",
			);
			answer($answer);
		endif;


	//	$_SESSION['teamLogin'] == $login;

	endif;

	if ($_SESSION['team'] == null AND @$_SESSION['teamLogin'] != null):

		$password  = $_POST['command'];

		$param = array(
		  'table' => 'clTeam',
		  'columns' => array('id', 'username', 'email', 'password', 'active'),
		  'where' => '(username="' . sql::str($_SESSION['teamLogin']) . '" OR email="' . sql::str($_SESSION['teamLogin']) . '")',
		  'limit' => 1,
		);
		$results = sql::get($param);


		if (empty($results)):
			$_SESSION['teamLogin'] = null;
			$answer = array(
				"Password invalid. Enter your username or email address",
			);
			answer($answer);
		else:

			if (@$results['active'] != '1'):
				$answer = array(
					"Account disabled",
				);
				answer($answer);
			endif;

			if (password_verify($password,crypto::out(@$results['password']))):
				$_SESSION['team'] = $results;
				$answer = array(
					"Welcome. You are logged as <b>" . $_SESSION['teamLogin'] . "</b>",
					"Enter your command",
				);
				answer($answer);
			else:
				$answer = array(
					"Password incorrect. Enter password for <b>" . @$_SESSION['teamLogin'] . "</b> account",
				);
				answer($answer);

			endif;

		endif;




	endif;





	$command = $_POST['command'];
	$command = trim($command," ");
	$commands = explode(' ' , $command);

	// System commands
	// ### change mod
	if (count($commands) == 1 AND substr($commands[0], 0, 1) == ':'):

		$mod = substr($commands[0], 1, strlen($commands[0]));
		if ($mod == ''):
			$answer = array(
				'No module activated',
			);
			answer($answer);
		endif;

		if ($mod == '?'):
			if ($_POST['mod'] == ''):
				$answer = array(
					'No active module',
				);
				answer($answer);
			else:
				$answer = array(
					'Active module: ' . $_POST['mod'],
				);
				answer($answer);
			endif;
		endif;

		if (file_exists('modules/' . $mod . '.php')):
			$_SESSION['mod'] = $mod;
			$answer = array(
				'Module activated: ' . $mod,
				'terminalSelectMod=' . $mod,
			);
			answer($answer);
		endif;


		$answer = array(
			'Module not found',

		);
		answer($answer);
	endif;







	if ($_POST['mod'] != ''):
		$modFile = 'modules/' . $_POST['mod'] . '.php';
		if (file_exists($modFile) AND is_file($modFile)):
			include($modFile);
		else:
			$answer = array(
				"M<odule not found '" . $_POST['mod'] . "'",
			);
			answer($answer);
		endif;
	endif;




	$answer = array(
		'Unknown command',
	);
	answer($answer);

else:
// if command not posted. Set '';
	$command = '';
endif;


// Check if is ajax request. If yes, start terminal command
if (isset( $_POST['command'])):
    $output = null;
	$command = $_POST['command'];

		// Check functions
		// Try: system

		// load modules
		$dirs = array_filter(glob('modules/*'), 'is_file');
		foreach ($dirs as $key => $value):
			echo $value;
			if ($value == ''):
		    	include($value);
			endif;
		endforeach;


		if($command == 'module')
		{
			$output = 'Yeah';
		}

		// No output
		if ($output == null):
			$answer = array(
				'Unknown command',
			);
			answer($answer);
		// Create an answer
		else:
			$output = nl2br($output);
			$answer = array(
				$output
			);
			answer($answer);
		endif;
else:
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="language" content="en">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="robots" CONTENT="noindex,nofollow">
	<meta name="distribution" content="IU">
	<meta name="copyright" content="G3ck Dev Team, dev@g3ck.com">
	<meta name="author" content="Jarek, jarek@g3ck.com">
	<meta name="author" content="Jarek, jarek@g3ck.com">
	<meta name="owner" content="G3ck Dev Team, dev@g3ck.com">
	<title>Codelab Terminal v1.0 alpha</title>
	<link rel="stylesheet" href="assets/reset.css">
	<link rel="stylesheet" href="assets/styles.css">
</head>
<body>


	<section id="terminal">
		<div id="input">
			<input id="command" type="text" value="">
		</div>
		<ul id="console"></ul>
	</section>
	<section id="panel">
		<div class="item">
			<label>Mod:</label><input type="text" id="mod" value="<?php echo @$_SESSION['mod']; ?>" readonly disabled>
		</div>
		<div class="item">
			<label>Response time:</label><input type="text" id="responseTime" value="0" readonly disabled>
		</div>
	</section>
	<script>
		// Log command into console
		function log(input){
			var div = document.getElementById('console');

			div.innerHTML = '<li>' + input + '</li>' + div.innerHTML;
		}
		// Create a answer log
		function answer(input, type=''){
			var div = document.getElementById('console');
			div.innerHTML = '<li class="answer ' + type + '">' + input + '</li>' + div.innerHTML;
		}
		// Welcome message
		function welcome(){
			var div = document.getElementById('console');
			<?php if ($_SESSION['team'] == null AND @$_SESSION['teamLogin'] != null): ?>
			div.innerHTML += '<li class="answer">Enter password for <b><?php echo @$_SESSION['teamLogin']; ?></b> account</li>';
			<?php elseif  ($_SESSION['team'] == null AND @$_SESSION['teamLogin'] == null): ?>
			div.innerHTML += '<li class="answer">Enter your username or email address</li>';
			<?php else: ?>
			div.innerHTML += '<li class="answer">Enter your command</li>';
			div.innerHTML += '<li class="answer">You are logged as <b><?php echo $_SESSION['teamLogin']; ?></b></li>';

			<?php endif; ?>
			div.innerHTML += '<li class="answer"><b>--------------------------------------------</b></li>';
			div.innerHTML += '<li class="answer">Codelab Console by G3ck.com</li>';
			div.innerHTML += '<li class="answer">Licensed under MIT License</li>';
			div.innerHTML += '<li class="answer"><a href="https://g3ck.com/codelab/tools/console">https://g3ck.com/codelab/tools/console</a></li>';
		}
		// Submit a command by jjax
		function ajax(command){

			var sendDate = (new Date()).getTime();


			var div = document.getElementById('console');
			var mod = document.getElementById('mod');
			var xhttp = new XMLHttpRequest();
		    xhttp.onreadystatechange = function() {
		      if (this.readyState == 4 && this.status == 200) {
				respond = this.responseText;
				function IsJsonString(str) {
				  try {
				    var json = JSON.parse(str);
				    return (typeof json === 'object');
				  } catch (e) {
				    return false;
				  }
				}
				if (IsJsonString(respond)){
						respond = JSON.parse(respond);
				  //the json is ok

				  for (var key in respond) {
  				    if (respond.hasOwnProperty(key)) {


  					   displayed = true;

					   if (respond[0].substring(0, 17) == "terminalSelectMod") {
					      	mod.value = respond[0].substring(18,respond[0].length);
							answer('Module activated: ' + mod.value);
							break;
					  } else {

						   answer(respond[key]);


					  }


  				    }
  				 }
				}else{
				  //the json is not ok
				  answer('Unexpected response format');
				}
		      }

		    };
		    xhttp.open("POST", window.location.href, true);
		    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		    xhttp.send("command=" + command + "&mod=" + mod.value);


			var receiveDate = (new Date()).getTime();

		 	var responseTimeMs = receiveDate - sendDate;

			document.getElementById('responseTime').value  = responseTimeMs;

		}
		// Get welcome message
		welcome();
		// Submit command
		document.getElementById("command").addEventListener("keyup", function(e){
			var valueThis = document.getElementById("command").value;
			// On enter click
			if (e.keyCode == 13) {
				document.getElementById("console").innerHTML= '';
				valueThis = valueThis.toLowerCase();
				if (valueThis != ''){
					// Log user command into console
					//log(valueThis);
					 document.getElementById("command").placeholder = valueThis;
					// Custom command
					// Clear terminal screan
					if (valueThis == 'cls'){
						document.getElementById("console").innerHTML = '';
					// Reset terminal
					} else if (valueThis == 'reset' || valueThis == 'res'){
						document.getElementById("console").innerHTML = '';
						welcome();
					// Hello
					} else if (valueThis == 'hello' || valueThis == 'hi'){
						answer('Hello')
					// Default module
					} else if (valueThis == ':' && document.getElementById('mod').value == ''){
						answer('Modules already disabled')
					// Response
					} else if (valueThis == ':'){
						answer('Module disabled')
						mod.value = '';
					// Response
					} else{
						ajax(valueThis);
					}
					document.getElementById("command").value = '';;
				}
				return false;
			}
		});
	document.getElementById("command").value = '';
		setInterval(function(){
			document.getElementById("command").focus();
		 }, 500);


	</script>
</body>
</html>
<?php endif; ?>
