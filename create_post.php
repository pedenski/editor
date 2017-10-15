<?php
//page title
$page_title = "Incedent Report";

//include libraries
include_once('lib/database.class.php');
include_once('lib/report.class.php');

$db = new database();
$report = new report($db->getConn());




?>

<?php include('_header.php'); ?>
<body>
<div class="container"> 
   
    <h1><i class="fa fa-file-text-o" aria-hidden="true"></i> <?php echo $page_title; ?></h1>
   


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
      
        <select name="category" id="category" class="selectpicker form-control" data-style="btn-success" data-hide-disabled="true" data-live-search="true">
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
       <select  name="severity" id="severity" class="selectpicker" >
          <?php 
            foreach($report->getSeverity() as $row) {
                  $SeverityID = $row['SeverityID'];
                  $SeverityName = $row['SeverityName'];

          ?>
            <option value="<?php echo $SeverityID; ?>"><?php echo $SeverityName; ?></option>

          <?php } ?>


       
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
<?php include('_footer.php'); ?>