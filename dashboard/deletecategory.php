<?php
session_start();
require_once("lib.php");

if (empty($_SESSION["admin"])) {
    header("LOCATION:login.php");
}
DeleteCategory($_GET['id']);
header("LOCATION:index.php");

