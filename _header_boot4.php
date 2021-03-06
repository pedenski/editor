<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script  src="https://code.jquery.com/jquery-3.2.1.js"  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="  crossorigin="anonymous"></script>

    <!-- !!BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    
    <!-- FONTAWESOME CSS --> 
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    

    <!-- CUSTOM CSS -->
    <link href="./dist/index.css" rel="stylesheet"> 

    <!-- !!TINYMCE -->
      <script src="./dist/tinymce/tinymce.min.js"></script>  
       <script type="text/javascript">
      tinymce.init({
        selector: '#textarea',
        height : "380",
        menubar: false,
        selector: 'textarea',
        branding: false,
        toolbar: 'undo redo styleselect bold italic bullist numlist outdent indent code codesample currentdate',
        plugins: 'advlist autolink link image lists charmap print preview code codesample paste',
        paste_as_text: true
        
        });
    
    </script>

</head>
