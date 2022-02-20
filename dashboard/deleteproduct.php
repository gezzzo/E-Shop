<?php

session_start();
require_once("lib.php");

if (empty($_SESSION["admin"])) {
    header("LOCATION:login.php");
}

DeleteProduct($_GET['id']);
header("LOCATION:products.php");

