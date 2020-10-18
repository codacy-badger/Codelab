<?php
    header('Content-type: application/json');
    $clAjax = true;
    include('../../../../../codelab.php');
    $login = auth::login(sql::str($_POST['username']), sql::str($_POST['password']));
    die(json_encode($login));
?>
