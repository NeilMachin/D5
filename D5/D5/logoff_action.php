<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['access_level']);
header("Location:index.php");
