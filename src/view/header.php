<?php

require_once(__DIR__.'/../model/Session.php');

$session = new VAULTX\Session();
?>

<html>
<head>
    <title>VAULTX - A Secure Password Manager</title>
</head>

<body>

<?php

$session->isUserLoggedIn() == true ? require_once(__DIR__."/profile.php") : require_once(__DIR__."/login.php");

?>
