<?php
$title = "EMK | Team";
include("partials/arrays.php");
include('partials/header.php');
include('partials/navigation.php');
?>
<!-- page-title -->
<div class="cmt-page-title-row">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-box">
                    <div class="page-title-heading">
                        <h1 class="title">Our Team</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumb-wrapper">
                        <span>
                            <a title="Homepage" href="index.php"><i class="ti ti-home"></i> Home</a>
                        </span>
                        <span class="cmt-bread-sep"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                        <span><span>Our Team</span></span>
                    </div>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- page-title end-->
<div class="site-main">
    <section class="cmt-row our-team-page-section clearfix">
        <div class="container">
            <div class="row">


                <?php
                $sql = "SELECT * FROM team";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                            <div class="col-lg-4 col-md-4 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-team style1 mb-30">
                                <!-- featured-thumbnail -->
                                <div class="featured-thumbnail">
                                    <img class="img-fluid" src="images/team-member/' . $row['image'] . '" alt="image">
                                    <div class="cmt-box-view-overlay"><!-- cmt-box-view-overlay -->
                                        
                                    </div><!-- featured-thumbnail end-->
                                </div>
                                <div class="featured-content text-center">
                                    <div class="featured-title">
                                        <h5><a href="team-details.php?id=' . $row['id'] . '">' . $row['name'] . '</a></h5>
                                    </div>
                                    <div class="category">
                                        <p>' . $row['description'] . '</p>
                                    </div>
                                </div>
                            </div><!-- featured-imagebox -->
                        </div>
                            ';
                    }
                }
                ?>



            </div>
        </div>
    </section>
    <?php
    include('partials/footer.php');
    include('partials/theme.php');
    include('partials/libraries.php');
    ?>