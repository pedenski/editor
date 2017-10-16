<?php
//include libraries
include_once('lib/database.class.php');
include_once('lib/report.class.php');

$db = new database();
$report = new report($db->getConn());






$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

if (!empty($errors)) {
    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;
} else {
    // if there are no errors process our form, then return a message
          

  
    //Title, UserID, Severity, Status, PostDate
    //Table: reporrtitle
    $report->title = $_POST['title'];
    $report->userid = "1";
    $report->severity = $_POST['severity'];
    $report->status = $_POST['status'];
    $report->incidentdate = $_POST['incidentdate'] ;

    //Activate method
   // $report->insert();
   

    //textarea and postid 
    $report->textarea = $_POST['textarea'];
    //$report->insertTextArea();

    //Insert tags
    

     //$report->tags = $tags;

     // foreach($tags as  &$t) {
     //    echo ":TagID".",".$t."<br />";
     // }

     
     //$data['tags'] = $tags;
   

    //$data['tags'] = $_POST['tags'];


            // $data['title'] = $_POST['title'];
            // $data['incidentdate'] = $_POST['incidentdate'];
            // $data['severity'] = $_POST['severity'];
            // $data['status'] = $_POST['status'];


            // $data['textarea'] = $_POST['textarea'];
             $arr = $_POST['tags'];
             $tags = explode(',',$arr);     
             print_r($tags);



            // $tags = $_POST['tags'];
            // $tags = explode(',',$tags);

        //$data['tags']=  $_POST['tags'];
    	// $report-> = $_POST['title']; //title of the post
    	
    	// $data['date'] = $_POST['date'];
    	 //$data['category'] = $_POST['category'];
    	// $data['severity'] = $_POST['selected'];
       // $data['text'] = $_POST['textarea'];

        
        // show a message of success and provide a true success variable
        // $data['success'] = true;
        // $data['message'] = 'Success!';
    }

    // return all our data to an AJAX call
    echo json_encode($data);
?>