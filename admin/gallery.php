
<?php 
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
          
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <!-- <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Sale</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Sale</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Revenue</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Revenue</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Sale & Revenue End -->


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
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Gallery</h6>
                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#service_modal"><i class="fa fa-plus"></i> New Gallery</a>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTables-example" class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">Project name</th>
                                    <th scope="col">Sub Category</th>
                                    <th scope="col">Image Gallery</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php 
                                $sql = "SELECT * FROM gallery LEFT JOIN projects ON gallery.project_id=projects.id LEFT JOIN sub_project_title ON sub_project_title.id=projects.sub_project_title_id";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                       echo '
                                       <tr>                             
                                       <td><input class="form-check-input" type="checkbox"></td>
                                       <td contenteditable="'.true.'">'.$row['title'].'</td>
                                       <td>'.$row['name'].'</td>
                                       <td><img src="../images/gallery/'.$row['gallery'].'" alt="" width="40" height="30"></td>
                                       <td>'.
                                    // '<a class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit_gallery' . $row['gallery_id'] . '" href="#"><i class="fa fa-edit"></i></a>'
                                       '<a class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete_gallery' . $row['gallery_id'] . '" href="#"><i class="fa fa-trash"></i></a>
                                       </td>

                                       <!-- Modal -->
                                       <div class="modal fade" id="edit_gallery' . $row['gallery_id'] . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                       <div class="modal-dialog modal-dialog-centered">
                                           <div class="modal-content">
                                           <div class="modal-header">
                                               <h5 class="modal-title" id="staticBackdropLabel">Edit Gallery</h5>
                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                           </div>
                                           <form action="backend/gallery.php" method="post" enctype="multipart/form-data">
                                               <div class="modal-body">
                                               
                                                       <div class="mb-3 form-group">
                                                       <label for="exampleFormControlInput1" class="">Project Name</label>
                                                       <input required value="' . $row['title'] . '" type="text" name="project" class="form-control" id="title" >
                                                       <input required value="' . $row['gallery_id'] . '" type="hidden" name="id" class="form-control" id="id" >
                                                       </div>
                                                       <div class="mb-3 form-group">
                                                       <label for="" class="">Image</label>
                                                       <input type="file" name="image" id="image" class="form-control" id="" >
                                                       <br/>
                                                       <p>Current Image</p>
                                                       <img class="img-fluid" src="../images/gallery/'.$row['gallery'].'" alt="" width="" height="">
                                                       </div>
                                               
                                               </div>
                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                   <button type="submit" name="edit_gallery_btn" class="btn btn-primary">Save</button>
                                               </div>
                                           </form>
                                           </div>
                                       </div>
                                       </div>
                                       <!-- Modal End -->

                                       <!-- Modal -->
                                       <div class="modal fade" id="delete_gallery' . $row['gallery_id'] . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                       <div class="modal-dialog modal-dialog-centered">
                                           <div class="modal-content">
                                           <div class="modal-header">
                                               <h5 class="modal-title" id="staticBackdropLabel">Delete Gallery</h5>
                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                           </div>
                                           <form action="backend/gallery.php" method="post" enctype="multipart/form-data">
                                               <div class="modal-body">
                                                       <div class="mb-3">
                                                       <label for="exampleFormControlInput1" class="form-label text-danger">Do you want to delete ?</label>
                                                       <input required value="' . $row['gallery_id'] . '" type="hidden" name="id" class="form-control" id="id" >
                                                       </div>
                                               
                                               </div>
                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                   <button type="submit" name="delete_gallery_btn" class="btn btn-primary">Yes</button>
                                               </div>
                                           </form>
                                           </div>
                                       </div>
                                       </div>
                                       <!-- Modal End -->

                                       </tr>
                                       ';
                                      }
                                }
                                ?>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

            <!-- Modal -->
            <div class="modal fade" id="service_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">New Gallery</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="backend/gallery.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                            <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Select Project</label>
                            <select required onchange="getSubProject(this.value)" type="text" name="project" class="form-control" id="project" >
                                <option value=""></option>
                                <?php 
                                $sql = "SELECT * FROM projects";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                       echo '
                                       <option value="'.$row['id'].'">'.$row['title'].'</option>
                                       ';
                                      }
                                }
                                ?>
                            </select>
                            </div>
                            <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control" id="exampleFormControlTextarea1" >
                            </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit_gallery" class="btn btn-primary">Save</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
            <!-- Modal End -->

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
</script>
</html>