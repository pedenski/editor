<?php
session_start();

unset($_SESSION['SessionID']);
session_destroy();
header('Location: index.php');



?>