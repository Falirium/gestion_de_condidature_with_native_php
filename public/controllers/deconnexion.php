<?php

session_start();
unset($_SESSION['user_id']);
header("Refresh:1; url=../");


?>