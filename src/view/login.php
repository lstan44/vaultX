<?php 
include __DIR__ . '/header.php';
?>
<div class="login">
<form method="POST" action="../controller/LoginController.php">
    <input type="text" name="email" placeholder="Email:"/></br>
    <input type="password" name="pwd" placeholder="Password"></br>
    <input type="submit">
</form>
</div>