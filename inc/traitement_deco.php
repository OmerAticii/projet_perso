<?php
include("constant.php");
include("cookieManage.php");
$pseudo = $_COOKIE["pseudo"];
disconnect($pseudo);
header("Location: ../index.php");
exit();