<?php

session_start();

setcookie('remember_this_user','',time()-3600);

session_destroy();

header("Refresh:0; url=profile.php");

?>
