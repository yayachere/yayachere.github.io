<?php include('header.php');?>

<!DOCTYPE html>
<html lang="en">
<style type="text/css">
  .container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}
  .container::after {
  content: "";
  clear: both;
  display: table;
}

  .time-right {
  float: right;
  color: #aaa;
}
 .button-right {
  float: right;
}
.button-right:hover {
  color: #aaa;
  text-decoration: underline;
}
</style>
<body>

  <!-- ======= Header ======= -->
<?php include('navbar.php');?>
  <!-- ======= Sidebar ======= -->
  <!-- End Sidebar-->
<?php include('sidebar.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">News</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
     
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                    <h5 class="card-title">News</h5>
              <?php 
              $query = mysqli_query($conn,"SELECT * FROM news where posted_to = 'student'");
            while($row = mysqli_fetch_assoc($query)){
              $up_on = $row['updated_on'];
              if ($up_on != null) {
                $qry = mysqli_query($conn,"SELECT * FROM news where posted_to = 'student' order by updated_on desc") or die(mysqli_error($conn));
                
              }else {
                $qry = mysqli_query($conn,"SELECT * FROM news where posted_to = 'student' order by id desc") or die(mysqli_error($conn));
              }}
            while($rows = mysqli_fetch_assoc($qry)){
                  $heading = $rows['header'];
                  $posted_on = $rows['posted_on'];
                  $updated_on = $rows['updated_on'];
                  $posted_by = $rows['posted_by'];
                  $news_id = $rows['id'];
                  $expire = $rows['expire'];
                  $cdate = date('Y-m-d');
                  $type = $rows['type'];
                  if ($updated_on == null) {
                    $time_ago = time_ago_function($posted_on);
                  }else{
                    $time_ago = time_ago_function($updated_on);
                  }
                                                 
                 ?>
<div class="container">
<p>
 <?php if ($type == 'info') {
  echo '<i class="bi bi-info-circle text-primary"> Information: </i>';
}elseif ($type == 'warning') {
  echo '  <i class="bi bi-exclamation-circle text-danger"> Warning: </i>';
} ?>
Title: <?php echo $heading;?> <a href="news_detail.php?ID=<?php echo $news_id;?>&time=<?php echo $time_ago;?>&update=<?php echo $updated_on;?>" class="button-right">Show More</a></p>
  <p><?php echo $posted_by;?><span class="time-right">
   <?php 
         if ($updated_on == null) {
              echo $time_ago;
            }else {
               echo "updated ". $time_ago;
            }
              ?></span></p>
</div>  <?php }?>
            </div>
          </div>

        </div>

  
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('footer.php');?>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>