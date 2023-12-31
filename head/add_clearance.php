<!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>
<head>
<script type="text/javascript">
  function show() {  
  var loader = document.getElementById('preloader');
    loader.style.display = "block";

  }
  function hide() {  
  var loader = document.getElementById('preloader');
    loader.style.display = "none";

  }
</script>
<style type="text/css">
    #preloader {
      background: #fff url(../Loading_2.gif) no-repeat center center;
      background-size: 10%;
      height: 100vh;
      width: 100%;
      position: fixed;
      z-index: 100;
    }
  </style>
</head>
<body onpagehide="show()" onpageshow="hide()">
<div id="preloader"></div>
  <!-- ======= Header ======= -->
  <?php include('navbar.php');?>
 <!-- End Header -->

  <!-- ======= Sidebar ======= -->
 <?php include('sidebar.php');?>
  <main id="main" class="main">
<div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item">Clearance</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="overflow-x: auto;">
            <div class="card-body">
              <h5 class="card-title">Add Clearance</h5>
        
              <!-- Table with stripped rows -->
              <table class="table datatable">
                  <thead>
                    <tr>
                        <th> Full Name </th>
                        <th> Student Id </th>
                        <th> School </th>
                        <th> Department</th>
                        <th> Status</th>
                        <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                 <?php
                    $query = mysqli_query($conn, "SELECT * FROM instructor WHERE user_id = '$session_id'") or die(mysqli_error($conn));
                    $row = mysqli_fetch_array($query);
                    $school = $row['school'];
                    $department = $row['department'];

                    $querys = mysqli_query($conn,"SELECT * FROM student WHERE status = 'completed' and school = '$school' and department = '$department'") or die(mysqli_error($conn));
                    while($rows = mysqli_fetch_assoc($querys)){
                        
                        $studentId=$rows['student_id'];
                        $firstName = $rows['first_name']; 
                        $middleName = $rows['middle_name']; 
                        $lastName = $rows['last_name'];
                        $fullName = $firstName. " ".$middleName." ".$lastName;
                        $status = $rows['status'];                
                   ?>
                        <tr>
                          <td> <?php echo $fullName;?> </td>
                          <td> <?php echo $rows['student_id'];?> </td>
                          <td> <?php echo $rows['school'];?> </td>
                          <td > <?php echo $rows['department'];?> </td>
                          <td> <?php echo $rows['status'];?> </td>
                          <td><a href="clearance_detail.php?ID=<?php echo $studentId;?>&fullName=<?php echo $fullName;?>&school=<?php echo $school;?>&department=<?php echo $department;?>&status=<?php echo $status;?>" class="btn btn-success">Add</td>
                        </tr><?php } ?>
                  </tbody>
              </table>
              <!-- End Table with stripped rows -->

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