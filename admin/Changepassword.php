<?php 
session_start();
include('db_connection.php');
include("../partials/particulars.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $company; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.3.1/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"/> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css"/> 
    
      <!-- Summernote CSS - CDN Link -->
      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php include('nav/side_bar.php'); ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->

            <?php include('nav/header.php'); ?>
            
            <div class="container-fluid pt-4 px-4">
            <div class="row g-4">

                <?php
                   if (isset($_GET['id'])) {
                    if ($_GET['id'] == 'inserted') {
                        echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Inserted Successfuly.....
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';
                    }
                    if ($_GET['id'] == 'not inserted') {
                        echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Not Inserted Try again......
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';
                    }
                    if ($_GET['id'] == 'updated') {
                        echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Updated Successfuly.....
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';
                    }
                    if ($_GET['id'] == 'not updated') {
                        echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Not Updated Try again......
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';
                    }
                    if ($_GET['id'] == 'deleted') {
                        echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Deleted Successfuly.....
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';
                    }
                    if ($_GET['id'] == 'not deleted') {
                        echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Not Deleted Try again......
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';
                    }
                    if ($_GET['id'] == 'empty name') {
                        echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Name field is empty...
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';
                    }
                    if ($_GET['id'] == 'not image type') {
                        echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     Invalid file type
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';
                    }
                }
                ?>
               
            </div>
            </div>


            <!-- Recent Sales Start -->
            <?php
                if (isset($_POST['submit'])) {

                    $sql = "SELECT * FROM users WHERE id= {$_SESSION["userId"]}";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($result);

                    if (mysqli_num_rows($result) > 0) {
                        $oldPassword = $row["password"];
                        $newpassword = $_POST["newPassword"];
                        if ($_POST["currentPassword"] == $oldPassword) {
                            $sql = "UPDATE users set password={$newpassword} WHERE id={$_SESSION["userId"]}";
                            mysqli_query($conn,$sql);
                            $message = "Password Changed";
                        } else
                            $message = "Current Password is not correct";
                    }
                }
                ?>


            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <div class="container tile-container">
                      <form class="form form-inline" name="frmChange" method="post" action=""
                            onSubmit="return validatePassword()">
                        <!-- <form class="form form-inline" name="frmChange" method="post" action=""> -->

                            <div class="validation-message text-center"><?php if(isset($message)) { echo $message; } ?></div>
                            <h2 class="text-center">Change Password</h2>
                            <div>
                                <div class="form-group">
                                    <label class="inline-block">Current Password</label>
                                    <span id="currentPassword"
                                        class="validation-message"></span> <input
                                        type="password" name="currentPassword"
                                        class="form-control">

                                </div>
                                <div class="form-group">
                                    <label class="inline-block">New Password</label> <span
                                        id="newPassword" class="validation-message"></span><input
                                        type="password" name="newPassword"
                                        class="form-control">

                                </div>
                                <div class="form-group">
                                    <label class="inline-block">Confirm Password</label>
                                    <span id="confirmPassword"
                                        class="validation-message"></span><input
                                        type="password" name="confirmPassword"
                                        class="form-control">

                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Submit"
                                        class="form-control mt-3">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

            <!-- Footer Start -->
           <?php include('nav/footer.php'); ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.3.1/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.js"></script>
     <!-- Summernote JS - CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#summernote").summernote();
            $("#summernote1").summernote();
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <!-- //Summernote JS - CDN Link -->
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
<script>
    $(document).ready(function () {
      
        $('#dataTables-example').DataTable({
     dom: 'Bfrtip',
 buttons: [
     'copy', 'csv', 'excel', 'pdf', 'print'
 ]
 });

 $('#dataTables-exampl').DataTable({
   dom: 'Bfrtip',
 buttons: [
   //  'copy', 'csv', 'excel', 'pdf', 'print'
 ]
 });
    });
  
    function getSubProject(value){
       // alert(value);
        $.ajax({
          type:'post',
          url:'backend/get_sub_project_category.php',
          data:{id:value},
          success:function (data) {
           $('#sub_project_category').html(data);
          }
        });
    }
// Validate password
    function validatePassword() {
	var currentPassword, newPassword, confirmPassword, output = true;

	currentPassword = document.frmChange.currentPassword;
	newPassword = document.frmChange.newPassword;
	confirmPassword = document.frmChange.confirmPassword;

	if (!currentPassword.value) {
		currentPassword.focus();
		document.getElementById("currentPassword").innerHTML = "required";
		output = false;
	}
	else if (!newPassword.value) {
		newPassword.focus();
		document.getElementById("newPassword").innerHTML = "required";
		output = false;
	}
	else if (!confirmPassword.value) {
		confirmPassword.focus();
		document.getElementById("confirmPassword").innerHTML = "required";
		output = false;
	}
	if (newPassword.value != confirmPassword.value) {
		newPassword.value = "";
		confirmPassword.value = "";
		newPassword.focus();
		document.getElementById("confirmPassword").innerHTML = "not same";
		output = false;
	}
	return output;
}
</script>
</html>