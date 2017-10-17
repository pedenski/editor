<?php
//page title
$id = isset($_GET['id']) ? $_GET['id'] : die ('Error: Missing ID');
$page_title = "View Incident";



//include libraries
include_once('lib/database.class.php');
include_once('lib/report.class.php');
include_once('lib/severity.class.php');


$db = new database();
$report = new report($db->getConn());
$severity = new severity($db->getConn());

$report->pageID = $id;



include('_header_boot4.php') ?>
<body>


<div class="container">
<div class="row">
  <div class="col-sm-8">




<?php $report->getPostTitle(); ?>
<table class="table  table-hover">
<thead>
</thead>


<tbody>

<tr>
   
   
   <td colspan="4"><h2 class="blog-post-title"><?php echo $report->title; ?> - <?php echo $report->postid; ?></h2>
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
    <table class="table table-bordered table-hover">
<thead>
<tr>

</tr>
</thead>

<tbody>
  <!-- Resolution -->
<tr>
   <td>
   <i class="fa fa-calendar" aria-hidden="true"></i><small> Posted:</small><?php echo $report->incidentdate; ?> <br />  
   <i class="fa fa-wrench" aria-hidden="true"></i>  <small>Status:</small> <?php echo $report->status; ?> <br />
   <i class="fa fa-wrench" aria-hidden="true"></i>  <small>Severity:</small>
   <?php 
   $severity->severityID = $report->severity;
   $severity->translateID();
   echo $severity->severityName;
   ?> <br />
   <i class="fa fa-commenting" aria-hidden="true"></i> <small>Reply:</small> 3<br />
   <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <small>Author: </small><?php echo $report->userid; ?><br />
    </td>
</tr>  


<!-- category -->
<tr>
   <td >
     Severity: <span class="badge badge-danger">High</span>
   </td>
   
</tr>  

<!-- tags -->
<tr>
   <td>
     <span class="badge badge-info">Info</span>
      <span class="badge badge-info">Server</span>
       <span class="badge badge-info">PHP</span>
        <span class="badge badge-info">Castlerock</span>
     </td>
</tr>  

  </div><!-- col sm 4 -->
</div><!--row-->
</div><!-- container -->





</body>
<?php include('_footer.php'); ?>