<?php
// Script untuk generate hash password operator loket
$password = 'loket123';
$hash = password_hash($password, PASSWORD_DEFAULT);
echo $hash;
?>
