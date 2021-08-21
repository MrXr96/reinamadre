<?php
session_start();
session_destroy();
$host= $_SERVER["HTTP_HOST"];
$link = "http://" . $host . "/reinamadre/";
header("Location:$link");
?>