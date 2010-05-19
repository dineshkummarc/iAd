<?php

/* Detect Mobile Version */

$user_agent = $_SERVER['HTTP_USER_AGENT'];

if (
  ((strstr($user_agent, ' AppleWebKit/') && strstr($user_agent, ' Mobile/')) || // it is an iPhone or iPod
  preg_match('/android/i',$user_agent)) && // or an android
  !preg_match('/ipad/i',$user_agent) // but not an iPad
) {
    header('Location: iad.html');
} else {
    require_once('desktop.html');
}

?>