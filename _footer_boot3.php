<footer>
<?php 
//dedicated php footer for create_post due to 'bootstrap tags and dropdown dependencies'
include_once('inc/create_post.script.php'); 
?>

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
