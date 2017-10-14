<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script  src="https://code.jquery.com/jquery-3.2.1.js"  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="  crossorigin="anonymous"></script>

    <!-- !!BOOTSTRAP CSS -->
    <link rel="stylesheet" href="./dist/bootstrapTags/bootstrap.min.css"> 

    <!-- BOOTSTRAP SELECT -->
    <link rel="stylesheet" href="./dist/bootstrapSelect/bootstrap-select.min.css">


    <!-- TAGS INPUT -->

    <link rel="stylesheet" href="./dist/bootstrapTags/bootstrap-tagsinput.css">


    <!-- !!DATETIME CSS --> 
    <link rel="stylesheet" type="text/css" href="./dist/jqueryDateTime/jquery.datetimepicker.css"/> 

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
        toolbar: 'undo redo styleselect bold italic bullist numlist outdent indent code codesample',
        plugins: 'advlist autolink link image lists charmap print preview code codesample'
       });
    </script>


  </head>
  <body>
<div class="container"> 
   
    <h1><i class="fa fa-file-text-o" aria-hidden="true"></i> Create Incident</h1>
   


<form action="submit_post.php" method="POST">
<table class="table table-bordered table-hover">
<thead>
<tr>
   
    <td colspan="4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</td>
</tr>
</thead>


<tbody>
<tr>
    <th scope="row">Title</th>
    <td colspan="3"><input type='text' value='' class='form-control' name="title" id="example-text-input" /></td>
  
     
</tr>
<tr>
    <th scope="row">Details</th>
    <td><input type="text" class="form-control mbot-5" name="date" id="datetimepicker7" placeholder="02/04/88"> </td>
    <td>
      
        <select id="category" class="selectpicker form-control" data-style="btn-success" data-hide-disabled="true" data-live-search="true">
        <optgroup disabled="disabled" label="disabled">
          <option>Hidden</option>
        </optgroup>
        <optgroup label="Category">
          <option data-icon="fa fa-cog">Resolved</option>
          <option data-icon="fa fa-cog">Unresolved</option>
        </optgroup>
        </select>

       
    </td>
    <td>
       <select id="severity" class="selectpicker form-control" data-style="btn-danger" data-hide-disabled="true" data-live-search="true">
        <optgroup disabled="disabled" label="disabled">
          <option>Hidden</option>
        </optgroup>
        <optgroup label="Severity">
          <option data-icon="fa fa-cog">Low</option>
          <option data-icon="fa fa-cog">High</option>
        </optgroup>
        </select>
    </td>
</tr>
<tr>
    <th scope="row">Affected Devices / Services</th>
   
     <td colspan="4">

    <input  type="text" name="tags" value="Switch,Router,database" data-role="tagsinput">
</td>
   
</tr>
<tr>
   
   
    <td colspan="4"><textarea id="textarea" name="textarea" id="textarea">Hello, World!</textarea></td>
</tr>


<tr>
    <td colspan="3">
    <button type="submit" class="mtop-5 btn btn-primary btn-lg btn-block">Submit</button>
    </td>
    <td colspan="3">
    <button type="submit" class="mtop-5 btn btn-warning btn-lg btn-block">Clear</button>
    </td>
</tr>
 
    </table>
  </form>




</div>





<footer>
   <script>
                      // magic.js
            $(document).ready(function() {

                // process the form
                $('form').submit(function(event) {

                    // get the form data
                    // there are many ways to get this data using jQuery (you can use the class or id also)
                    var formData = {
                        'title'     : $('input[name=title]').val(),
                        'date'      : $('input[name=date]').val(),
                        'category'  : $('#category option:selected').text(),
                        'severity'  : $('#severity option:selected').text(),
                        'tags'      : $("input[name=tags]").val(),
                        'textarea'      : $("#textarea[name=textarea]").val()
                    };

                    // process the form
                    $.ajax({
                        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                        url         : 'submit_post.php', // the url where we want to POST
                        data        : formData, // our data object
                        dataType    : 'json', // what type of data do we expect back from the server
                        encode      : true
                    })
                        // using the done promise callback
                            .done(function(data) {

                            // log data to the console so we can see
                            console.log(data); 

                            // here we will handle errors and validation messages
                        });

                    // stop the form from submitting the normal way and refreshing the page
                           event.preventDefault();
                });
         
            });
                



     
        </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="./dist/bootstrapTags/angular.min.js"></script>
    <script src="./dist/bootstrapTags/bootstrap-tagsinput.min.js"></script>
    <!-- <script src="./dist/bootstrapTags/bootstrap-tagsinput-angular.min.js"></script> -->
    <script src="./dist/bootstrapSelect/bootstrap-select.min.js" defer></script>

   
    <!-- BOOTSTRAP POST TAGS -->
  
   

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



              
</footer>
  </body>
</html>