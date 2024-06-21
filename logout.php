<?php
session_start();
$_SESSION['itlogin'] = "";
header('Location: /auth.php');