<?php

session_start();
unset($_SESSION['user_id']);

// add a success alert
$successtMsg = "You have been disconnected successfuly";
setcookie("alert", $successtMsg, 1200, "../");


header("Refresh:1; url=../");


?>