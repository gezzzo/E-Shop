<?php

session_start();
require_once("lib.php");

if (empty($_SESSION["admin"])) {
    header("LOCATION:login.php");
}

if (isset($_POST['Name'])) {

    $name = $_POST['Name'];
    $id = $_POST['id'];
    $description = $_POST['Description'];

    $temp = $_FILES["img"]["tmp_name"];
    $img = $_FILES["img"]["name"];
    move_uploaded_file($temp,"images/".$img);

    if(empty($img)){
        $img = $_POST["oldthumbnail"];
    }
    

    $errors=[];
    if (empty($name)) {
        $errors[]="The name is required";
    }
    if (empty($description)) {
        $errors[]="The description is required";
    }
    if (empty($errors)) {
        UpdateCategory($id,$name,$description,$img);
        header("LOCATION:index.php");
        
    }

}
else{
    $category = ShowCategoryById($_GET["id"]);
}





?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ecommerce</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="assets/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand ps-3" href="index.php">Eshop dashboard</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <p class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></p>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="settings.php">Settings</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Category</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Category
                            </a>
                            <a href="addcategory.php" class="nav-link btn btn-primary ">Add Category</a> 
                            <div class="sb-sidenav-menu-heading">Product</div>
                            <a class="nav-link" href="products.php">
                                <div class="sb-nav-link-icon"><i class="fab fa-buffer"></i></div>
                                Product
                            </a>
                            <a href="addproduct.php" class="nav-link btn btn-primary ">Add Product</a> 

                            <div class="sb-sidenav-menu-heading">Settings</div>
                            <a class="nav-link" href="settings.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                                Settings
                            </a>
                        </div>
                    </div>
                </nav>
            </div>


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Update Category</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputName" type="text" placeholder="Name" name="Name" value="<?= $category["name"]; ?>"/>
                                <label for="inputName">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputDescription" type="text" placeholder="Description" name="Description" value="<?= $category["description"]; ?>" />
                                <label for="inputDescription">Description</label>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="img"  class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">upload Image</label>
                            </div>
                            <br>
                            <img src="images/<?= $category["thumbnail"]?>" alt="" srcset="" height="150px">
                            <br>

                            <input type="hidden" name="id" value="<?= $_GET["id"] ?>" >
                            <input type="hidden" name="oldthumbnail" value="<?= $category["thumbnail"] ?>" >
                            <br>
                            <input type="submit" class="btn btn-primary">

                            
                        </form>                   
                        
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="assets/js/datatables-simple-demo.js"></script>
    </body>
</html>