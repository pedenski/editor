<?php

include $_SERVER['DOCUMENT_ROOT'].'/'.'editor'.'/'.'inc'.'/'.'functions.php';


/*print_r($_POST);

echo $title = $_POST['title'];
echo $textarea = $_POST['textarea'];
echo $date = $_POST['date'];*/



$e = submitpost($_POST);
echo $e;


?>