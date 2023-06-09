<?php
include('../db_connection.php');
$sub_id = $_GET['subcategory'];
$sql = "SELECT * FROM projects WHERE sub_project_title_id = $sub_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
                <div class="col-lg-4 col-md-6">
                <!-- featured-imagebox -->
                <div class="featured-imagebox featured-imagebox-portfolio style1 mb-30">
                    <!-- featured-thumbnail -->
                    <div class="featured-thumbnail">
                        <img class="img-fluid" src="images/portfolio/' . $row['image'] . '" alt="image">
                    </div><!-- featured-thumbnail end -->
                    <!-- cmt-box-view-overlay -->
                    <div class="cmt-box-view-overlay">
                        <div class="portfolio-icon-box">
                            <a href="project-details.php?id=' . $row['id'] . '"><i class="ti ti-plus"></i></a>
                        </div>
                    </div><!-- cmt-box-view-overlay end-->
                    <div class="featured-content">
                        <div class="category">
                            <p>' . $row['title'] . '</p>
                        </div>
                        <div class="featured-title">
                            <h5><a href="project-details.php?id=' . $row['id'] . '">' . $row['description'] . '</a></h5>
                        </div>
                    </div>
                </div><!-- featured-imagebox -->
            </div>
                ';
    }
}
else {
    echo "No Project added for this Sub Category";
}
?>