<?php
$title = "Pro-Mek-Engineering | Projects";
include('partials/header.php');
include('partials/navigation.php');
include('db_connection.php');
?>

<!-- page-title -->
<div class="cmt-page-title-row">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-box">
                    <div class="page-title-heading">
                        <h1 class="title">Gallery</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumb-wrapper">
                        <span>
                            <a title="Homepage" href="index.php"><i class="ti ti-home"></i> Home</a>
                        </span>
                        <span class="cmt-bread-sep"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                        <span><span>Our Gallery</span></span>
                    </div>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- page-title end-->
<!--element-row-->
<!--site-main start-->
<div class="site-main">

    <!--broken-section-->
    <section class="cmt-row portfolio-top-section clearfix">
    <div class="container mb-10">
            <form class='form' action="">
                <div class="form-group">
                    <label for="category">Select project</label>
                    <select onchange="loadgallery(this.value)" name="project" id="project">
                    <option value=""></option>'
                    <?php
                        $query = "SELECT * FROM projects";
                        $result = mysqli_query($conn, $query);
                        if(mysqli_num_rows($result)>0){
                        while ($row = mysqli_fetch_assoc($result)){
                            echo'<option value="'.$row["id"].'">'.$row["title"].'</option>';
                        }
                        }
                    ?>   
                    </select>
                </div>
            </form>
        </div>
        <div class="row" id="galleries">
            
            <?php

                $sql = "SELECT * FROM gallery";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col-md-3 col-lg-3 col-sm-3">';
                        echo '<img class="img-fluid w-100 mb-2 mb-md-4 shadow-1-strong rounded" src="images/gallery/'.$row['gallery'].'" alt="">';
                        echo '</div>';
                }
                }


                ?>
            
        </div>



    </section>
    <!--broken-section end-->

<!-- </div>site-main end -->

<?php
include('partials/footer.php');
include('partials/theme.php');
include('partials/libraries.php');
?>

<script>
    function loadgallery(value){
       // alert(value);
        $.ajax({
          type:'post',
          url:'loads/loadgallery.php',
          data:{id:value},
          success:function (data) {
           $('#galleries').html(data);
          }
        });
    }
</script>