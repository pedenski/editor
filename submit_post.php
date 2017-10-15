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

            $data['severity'] = $_POST['severity'];
            $data['category'] = $_POST['category'];
            $data['title'] = $_POST['title'];
            // $tags = $_POST['tags'];
            // $tags = explode(',',$tags);

        //$data['tags']=  $_POST['tags'];
    	// $report-> = $_POST['title']; //title of the post
    	
    	// $data['date'] = $_POST['date'];
    	 //$data['category'] = $_POST['category'];
    	// $data['severity'] = $_POST['selected'];
       // $data['text'] = $_POST['textarea'];

        
        // show a message of success and provide a true success variable
        //$data['success'] = true;
       // $data['message'] = 'Success!';
    }

    // return all our data to an AJAX call
    echo json_encode($data);
?>