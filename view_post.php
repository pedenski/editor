<?php
//page title
$id = isset($_GET['id']) ? $_GET['id'] : die ('Error: Missing ID');
$page_title = "View Incident";



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


$report->pageID = $id;



include('_header_boot4.php') ?>
<body>


<div class="container">
<div class="row">
  <div class="col-sm-8">




<?php $report->getPostTitle(); ?>
<table class="table table-sm">
<thead>
</thead>


<tbody>

<tr>
   
   
   <td colspan="4"><h2 class="blog-post-title"><?php echo ucfirst($report->title); ?></h2>
   </td>
  </th>
   
     

   

   
</tr>

   






<tr>
<td colspan="4 _view_content" > 
            <?php 
            $report->getPostDetail();
            echo $report->textarea;
            ?>
</td>
</tr>

<tr>
   <!-- COMMENT user -->   
    <td class="_comment_avatar"> 

    <a href="https://placeholder.com"><img src="http://via.placeholder.com/100x100/87CCE6"></a>
  </td >
    <td colspan="4" class="_comment_body"><p>Cras mattis consectetur purus sit amet fermentum. asdfasdfasdfsdfasfasfasdfffsadfsdfasdfasdfSed posuere consectetur est at lobortismattis consectetur purus sit amet fermentum. asdfasdfasdfsdfasfasfamattis consectetur purus sit amet fermentum. asdfasdfa amet fermentum. asdfasdfa</p></td>
</tr>
<tr>
   <!-- COMMENT user -->   
    <td class="_comment_avatar"> 

    <a href="https://placeholder.com"><img src="http://via.placeholder.com/100x100/FFC96C"></a>
  </td >
    <td colspan="4" class="_comment_body"><p>Cras mattis consectetur purus sit amet fermentum. asdfasdfasdfsdfasfasfasdfffsadfsdfasdfa</p></td>
</tr>



<tr>
   <!-- COMMENT REPLY -->   
    <td colspan="4"><textarea id="textarea" name="textarea" id="textarea">Hello, World!</textarea></td>
</tr>
 <tr>
<td colspan="1"><button type="button" class="btn btn-outline-danger btn-sm btn-block">Clear</button></td>
<td colspan="3"><button type="button" class="btn btn-outline-primary btn-sm btn-block">Submit</button></td>
</tr>
    </table>



  </div>
  <div class="col-sm-4 blog-sidebar">
<table class="table info_table table-sm">
  <thead>
    
  </thead>
  <tbody>
    <tr>
      <td class="info_table_icon"> <i class="fa fa-calendar" aria-hidden="true"></i></td class="z"><td><span class="text-muted"> Incident Date</span></td>
      <td><?php echo $report->incidentdate; ?></td>
    
    </tr>
    <tr>
       <td class="info_table_icon"><i class="fa fa-object-ungroup" aria-hidden="true"></i></td><td><span class="text-muted"> Status</span></td>
      <td><?php 


      $status->StatusID = $report->status;
      $status->translateID();
      echo $status->StatusName;

      ?></td>
  
    </tr>
    <tr>
    <td class="info_table_icon"> <i class="fa fa-thermometer-quarter" aria-hidden="true"></i></td><td><span class="text-muted"> Severity</span></td>
    <td> <?php 
           $severity->severityID = $report->severity;
           $severity->translateID();

           if($severity->severityName == "Low") {
              echo "<span class='badge badge-warning'>".$severity->severityName."</span>";
           } elseif($severity->severityName == "High") {
              echo "<span class='badge badge-danger'>".$severity->severityName."</span>";
           }
         ?> 
    </td>
    </tr>
      <tr>
       <td class="info_table_icon"> <i class="fa fa-user-o" aria-hidden="true"></i></td><td><span class="text-muted"> Author </span></td>
      <td><?php 
          $user->UserID = $report->userid;
          $user->translateID();
          echo $user->UserName;
          ?>
      </td>
    </tr>
      <tr>
       <td class="info_table_icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></td><td><span class="text-muted"> Replies</span></td>
      <td>3</td>
    </tr>



  </tbody>
</table>




<table class="table table-bordered table-sm">

<tbody>
<!-- Severity -->
<tr>
   <td >
     Tags
   </td>
   
</tr>  
<tr>
   <td>
<?php 
$tags->PostID = $id;
$a = $tags->getTagsPage();

foreach($a as $k => $v) { ?>
<span class="badge badge-info"><?php echo $v['TagName'];?></span>
<?php } ?>
   </td>
</tr>  
</tbody>
</table>
  </div><!-- col sm 4 -->
</div><!--row-->
</div><!-- container -->





</body>
<?php include('_footer.php'); ?>