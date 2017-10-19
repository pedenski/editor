<?php 


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
$user = new user($db->getConn());
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
 
<div class="_titlelisting">  
    <?php foreach($titleListing as $row) {
          //small 'l' for listing
          $lpid = $row['PostID'];
          $ltitle = $row['PostTitle'];
          $luserID = $row['UserID'];
          $lseverity = $row['Severity'];
          $lstatus = $row['Status'];
          $lcreated = $row['PostDate']; ?>


  <h4 class="text-info"><a class="title_post" href="view_post.php?id=<?php echo $lpid; ?>"><?php echo ucfirst($ltitle); ?></h4></a>
  <p class="lead text-secondary">  <small class="text-muted">
  <?php
    $report->postid = $lpid;
    $report->getPostDetailsOfTitle();
  ?>
<?php echo strip_tags(substr($report->textarea, 0, 300));?>...


</small>
  </p>
  <p class="mb-0"><?php 
                  $tags->PostID = $lpid;
                  $a = $tags->getTagsPage();

                  foreach($a as $k => $v) { ?>
                   <span class="badge badge-warning"><?php echo $v['TagName'];?></span>
                   <?php } ?>
  </p>
 <hr>
  <?php } ?>
</div>
    





  </div>
  <div class="col-sm-4 blog-sidebar">
   <a class="btn btn-outline-primary btn-block" href="create_post.php" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Create Incident Report</a>
     <hr>
    <table class="table table-bordered table-sm">
      <tbody>
      <!-- Severity -->
      <tr>
         <td >
         Online:
         </td>
         
      </tr>  
      <tr>
         <td>
      Zild, Murai, Test
         </td>
      </tr>  
      </tbody>
      </table>
  </div><!-- col sm 4 -->
</div><!--row-->
</div><!-- container -->





</body>

<?php include('_footer.php'); ?>