<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./dist/bootstrapCSS/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

  
    <link href="./dist/post.css" rel="stylesheet">   
    

   

  </head>
  <body>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/'.'editor'.'/'.'inc'.'/'.'functions.php';
$e = getpost();
foreach ($e as $r) {
	$r = $r['PostText'];
?> 


<div class="wrapper">
	<?php echo $r; ?> 
	<hr />
</div>


<?php } //end getpost ?>

</body>

</html>