<?php

session_start();

// remove all session variables
unset($_SESSION['u-first']);
session_unset();

// destroy the session
session_destroy();

header("Location: ../login.php?index=success");
 			   				exit;
?>
