<!DOCTYPE html>
<html lang="en">
<!-- blank.html -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E avalablity</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->

            <a class="sidebar-brand align-items-center " href="index.html">
                <div class="sidebar-brand-icon">

                    <style>
                        img {
                            border: 1px solid #ddd;
                            /* Gray border */
                            border-radius: 4px;
                            /* Rounded border */
                            padding: 1px;
                            /* Some padding */
                            width: 80px;
                            /* Set a small width */
                        }

                        /* Add a hover effect (blue shadow) */
                        img:hover {
                            box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
                        }
                    </style>

                    <body>
                        <img src="logo.jpg" class="avatar" alt="avatar">
            </a>

</body>
</div>

<hr class="sidebar-divider">

<div class="sidebar-brand-text mx-3" style='color:white'>E-availibility </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="dashadmin.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->




<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="forminsert.php">
        <i class="fas fa-fw fa-cog" style='color:white'></i>
        <span>Insert</span>
    </a>
</li>

<hr class="sidebar-divider">

<li class="nav-item">
    <a class="nav-link collapsed" href="viewlect.php">
        <i class="fas fa-eye" style='color:brown'></i>
        <span>View Lecturer</span>
    </a>
</li>
<hr class="sidebar-divider">

<li class="nav-item">
    <a class="nav-link collapsed" href="viewstud.php">
        <i class="fas fa-eye" style='color:brown'></i>
        <span>View Student</span>
    </a>
</li>
<hr class="sidebar-divider">

<li class="nav-item">
    <a class="nav-link collapsed" href="viewuserorder.php">
        <i class="fas fa-eye" style='color:brown'></i>
        <span>View Customer Order</span>
    </a>
</li>
<hr class="sidebar-divider">


<!-- Nav Item - Utilities Collapse Menu -->




<li class="nav-item">
    <a class="nav-link collapsed" href="lectprofileupdate.php">
        <i class="fa fa-edit" style='color:green'></i>
        <span>Edit Lecturer Profile</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get" action="searchadmin.php">
                <div class="input-group">
                    <input name="katakunci" type="text" class="form-control bg-light border-0 small" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->


                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php
                                                                                    //session_start();

                                                                                    if (isset($_SESSION['lect_name'])) {
                                                                                        echo $_SESSION['lect_name'];
                                                                                    }

                                                                                    ?>

                        </span>

                        <?php
                        //session_start();

                        if (isset($_SESSION['lect_imagefile'])) {
                            //echo $_SESSION['imagefile'];

                            echo "<img class='img-profile rounded-circle' 
                  src='adminimage/" . $_SESSION['lect_imagefile'] . "'>";
                        }
                        ?>

                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                        <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- header.template.php -->