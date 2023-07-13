<style>
div.gallery {
  border: None;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}
/* * {
  box-sizing: border-box;
} */

.gallery_responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .gallery_responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}
@media only screen and (max-width: 500px) {
  .gallery_responsive {
    width: 100%;
  }
}

</style>

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
                        echo '<div class="gallery_responsive"><div class="gallery">';
                        echo '
                        <a target="_blank" href="images/gallery/'.$row['gallery'].'">
                        <img class="img-fluid img-thumbnail" src="images/gallery/'.$row['gallery'].'" alt="Cinque Terre">
                        </a>';
                        echo ' </a></div></div>';
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