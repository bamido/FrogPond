<?php
session_start();
// kill session
session_destroy();
header("Location: ../frontend/login.php");

?>