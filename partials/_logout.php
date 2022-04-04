<?php
session_start();
echo 'Logging out........';
session_destroy();
header("Location: /college-forum/index.php");
?>