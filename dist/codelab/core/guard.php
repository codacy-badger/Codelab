<?php

	class guard {


		    // In ##################################################################
		    public static function wall() {
				if (@clConfig['guard']['wall']['password']):
					$password = clConfig['guard']['wall']['password'];
				    //put sha1() encrypted password here - example is 'hello'
				    if (!isset($_SESSION['clGuardWallLogged'])) {
				        $_SESSION['clGuardWallLogged'] = false;
				    }
				    if (isset($_POST['clGuardWallPassword'])) {
				        if ($_POST['clGuardWallPassword'] == $password) {
				            $_SESSION['clGuardWallLogged'] = true;
				        } else {
				           $clGuardWallMessage =  ('Incorrect password');
				        }
				    }
				    if (!$_SESSION['clGuardWallLogged']): ?>
					<html><head><title>Login</title><style> .seo-highlighter { border-color: red; border-width: 5px; border-style: solid; border-radius: 18px; }</style><style> .seo-highlighter { border-color: red; border-width: 5px; border-style: solid; border-radius: 18px; }</style><style> .seo-highlighter { border-color: red; border-width: 5px; border-style: solid; border-radius: 18px; }</style><style> .seo-highlighter { border-color: red; border-width: 5px; border-style: solid; border-radius: 18px; }</style></head>
					<body cz-shortcut-listen="true" style="background-color: black;color: black;">

					 <div class="box" style="position: absolute;left: 50%;-ms-transform: translate(-50%, -50%);-webkit-transform: translate(-50%, -50%);transform: translate(-50%, -50%);border: 1px solid #373737;text-align: center;overflow: hidden;top: 48%;padding: 20px;background-color: white;font-family: Arial, Helvetica, sans-serif;width: 320px;">

						<?php if (@$clGuardWallMessage): ?>
							<h2 style="padding: 0;margin: 0;background-color: #8d0808;color: white;font-size: 15px;padding: 10px;font-weight: 100;">
								Incorrect password
							</h2>
						<?php endif; ?>

						 <form method="post">
						  <input type="password" name="clGuardWallPassword" style="width: 100%;text-align: center;font-size: 22px;border: unset;border-bottom: 1px solid black;padding: 15px;" placeholder="Password"> <br>
					     <input type="submit" name="submit" value="Login" style="width: 100%;font-size: 18px;background-color: black;color: white;padding: 10px;margin-top: 15px;border: unset;">
					   </form>
					 </div>
				    </body></html>

				    <?php
				    exit();
				    endif;
			endif;
		    }
	}

	// Protect page by password
	guard::wall();

//	sql::connect();
?>
