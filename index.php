<?php

/* Detect Mobile Safari */

$user_agent = $_SERVER['HTTP_USER_AGENT'];

if (strstr($user_agent, ' AppleWebKit/') && strstr($user_agent, ' Mobile/')) {
    header('Location: iad.html');
} else {
    require_once('index.html');
}

?>