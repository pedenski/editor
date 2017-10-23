<?php 
session_start();
if(isset($_SESSION['SessionID'])) {
  echo "yes";

} else {

  echo "no";
}

//include libraries
include_once('lib/database.class.php');
include_once('lib/report.class.php');
include_once('lib/severity.class.php');
include_once('lib/status.class.php');
include_once('lib/user.class.php');
include_once('lib/tags.class.php');

$db = new database();
$report = new report($db->getConn());
$severity = new severity($db->getConn());
$status = new status($db->getConn());
$user = new user($db);
$tags = new tags($db->getConn());

include('_header_boot4.php');
?>

<body>



<?php 
$titleListing = $report->getTitleListing();
?>
<div class="container">
<div class="row">
  <div class="col-sm-8">
   
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i> Recent</a>
  </li>
 
  <li class="nav-item">
    <a class="nav-link resolved" href="#"><i class="fa fa-check-square-o" aria-hidden="true"></i> Resolved</a>
  </li>
  <li class="nav-item">
    <a class="nav-link unresolved" href="#"> <i class="fa fa-times" aria-hidden="true"></i> Unresolved</a>
  </li>
</ul>

<table class="table _titlelisting">
  <thead>
    <tr>
    </tr>
  </thead>
  <tbody>

 
    <?php foreach($titleListing as $row) {
          //small 'l' for listing
          $lpid = $row['PostID'];
          $ltitle = $row['PostTitle'];
          $luserID = $row['UserID'];
          $lseverity = $row['Severity'];
          $lstatus = $row['Status'];
          $lcreated = $row['PostDate']; ?>

<tr>

<td align="left"><a class="title_post" href="view_post.php?id=<?php echo $lpid; ?>"><?php echo ucfirst($ltitle); ?></a></td>

<td align="right"><small>

<?php 
           $severity->severityID = $lseverity;
           $severity->translateID();

           if($severity->severityName == "Low") {
              echo "<a class='text-warning'>".$severity->severityName."</a>";
           } elseif($severity->severityName == "High") {
              echo "<a class='text-danger'>".$severity->severityName."</a>";
           }
         ?> 





 | <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $lcreated; ?></small></td>
 
  
 </tr>
 <tr> 
  <?php
    $report->postid = $lpid;
    $report->getPostDetailsOfTitle();
  ?>


<td colspan="3"><?php echo strip_tags(substr($report->textarea, 0, 300));?>...</td>
</tr>



<tr>
 <td colspan="3">   
<?php 
                  $tags->PostID = $lpid;
                  $a = $tags->getTagsPage();

                  foreach($a as $k => $v) { ?>
     <a href="#" class="badge badge-info"><?php echo $v['TagName'];?></a> 
                   <?php } ?>
</td>
</tr>

  <?php } ?>

</tbody>
</table>

    

  </div>
  <div class="col-sm-4 blog-sidebar">
 





    <form id="login" action="login.php" method="POST">
    <table class="table table-bordered table-sm">
      
      <tbody>
      <!-- Severity -->
      <tr>
         <td >
        <input type="text" id="username" name="username" class="form-control mb-2 mb-sm-0"  placeholder="Username">
         </td>
         
      </tr>  
      <tr>
         <td>
     
    <input type="password" id="password" name="password" class="form-control" placeholder="Password">

         </td>
         </tr>  

      <tr>
         <td>
     
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    <a href="logout.php">Logout</a>

         </td>
      </tr>  
      </tbody>
         
      </table>
  </form>








   <a class="btn btn-outline-primary btn-block" href="create_post.php" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Create Incident Report</a>
  

  </div><!-- col sm 4 -->
</div><!--row-->
</div><!-- container -->





</body>

<?php include('_footer_boot4.php'); ?>