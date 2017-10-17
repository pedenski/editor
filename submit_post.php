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
    $report->insert();
   
   
    //textarea and postid 
    $report->textarea = $_POST['textarea'];
    $report->insertTextArea();

    //Insert tags
    /*
     * How Tagging Table Work:
     * upon submission of title (getID)
     * then insert tags in a foreach loop in tags table, for each insert of tag (getID)
     * inside TagMap table, input ID's of title and tag table.
     */
    $tags = $_POST['tags'];  //{str1, str2, str3}
    $tags = explode(",",$tags); //explode each string from {}
    $report->tags = $tags; //insert tag in method
    $report->insertTags(); //execute insert
    
    $data['success'] = true;
    $data['message'] = 'Success!';
}

    // return all our data to an AJAX call
    echo json_encode($data);
?>