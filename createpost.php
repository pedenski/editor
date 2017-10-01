<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./dist/bootstrapCSS/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      
    <link rel="stylesheet" type="text/css" href="./dist/jqueryDateTime/jquery.datetimepicker.css"/> 
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="./dist/index.css" rel="stylesheet"> 

      <script src="./dist/tinymce/tinymce.min.js"></script>  
      <script type="text/javascript">
      tinymce.init({
        selector: '#textarea',
        menubar: false,
        selector: 'textarea',
        branding: false,
        toolbar: 'undo redo styleselect bold italic bullist numlist outdent indent code codesample',
        plugins: 'advlist autolink link image lists charmap print preview code codesample'
       });
    </script>


  </head>
  <body>
<div class="wrap"> 
   
    <h1>Zild Editor</h1>
   
    <form method="post" action="./plugins/submitform.php">
             <!-- TITLE -->
            <div class="form-group row">
                <div class="col-10">
                <input class="form-control" type="text" value="Title, Be Specific" name="title" id="example-text-input">
              </div>
            </div>

     
            <!-- DATE -->
            
            <input type="text" class="mbot-5" name="date"  id="datetimepicker7"> 
   


            <!-- CONTENT -->
            <textarea name="textarea" id="textarea">Hello, World!</textarea>
            <!-- SUBMIT -->
            <button type="submit" class="mtop-5 btn btn-primary">Submit</button>
    </form>
    
    <!-- TAGS -->


    <a href="./viewpost.php">POST</a>

</div>





<footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!--DATETIME PICKER -->
    <script src="./dist/jqueryDateTime/build/jquery.datetimepicker.full.js"></script>
    <script>
        var logic = function( currentDateTime ){
            if (currentDateTime && currentDateTime.getDay() == 6){
                this.setOptions({
                    minTime:'11:00'
                });
            }else
                this.setOptions({
                    minTime:'8:00'
                });
        };
        $('#datetimepicker7').datetimepicker({
            onChangeDateTime:logic,
            onShow:logic
        });
    </script>
   
</script>           
</footer>
  </body>
</html>