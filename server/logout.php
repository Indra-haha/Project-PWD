<?php
session_start();
session_unset();
session_destroy();
header('Location: ../ibarbo-park/index.php');
exit();
?>