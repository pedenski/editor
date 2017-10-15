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
                        'category'  : $( "select#category option:selected" ).val(),
                        'severity'  : $( "select#severity option:selected" ).val(),
                        'tags'      : $("input[name=tags]").val(),
                        'textarea'  : $("#textarea[name=textarea]").val()
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