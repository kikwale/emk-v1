<?php session_start(); ?>
<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>EMK</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/usr.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php $_SESSION['name']; ?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="services.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Service</a>
                    <a href="projects.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Projects</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Categories</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="project_main.php" class="dropdown-item">Main Category Projects</a>
                            <a href="project_sub.php" class="dropdown-item">Sub Category Projects</a>
                        </div>
                    </div>
                    
                    <a href="team.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Team</a>
                  
                </div>
            </nav>
        </div>