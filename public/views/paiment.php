<?php


session_start();
//Check if a $_SESSION[admin] is set
// else redirect to connxion page

if (!isset($_SESSION['user_id'])) {
    header("Refresh:1; url=../");
}


?>