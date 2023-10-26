<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATN SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>.dropdown:hover .dropdown-menu{
        display: block;
    }</style>

<!-- Navbar -->


<nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">   
        <div class="row">
					<div class="col-sm-9">
						<div class="contactinfo" >
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 08626377677</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> atnshop@gmail.com</a></li>
							</ul>
						</div>
					</div>

				</div>        
        <a class="navbar-brand mt-2 mt-lg-0" href="homeadmin.php">
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfhPkvN-bKBJ4e71FS9YmZjUzk7a3VOC5HEg&usqp=CAU"
          href="homeadmin.php"
          height="80"
          alt="MDB Logo"
          loading="lazy"
        />
      </a>
            <button type="btn" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navsup">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navsup">
                <!--left-->
                <div class="navbar-nav">
                    <a href="homeadmin.php" class="nav-link ">HOME</a>             
                    <a href="productadmin.php" class="nav-link ">PRODUCTS</a>
                    <div class="dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">MANAGER</a>                  
                    <div class="dropdown-menu">                  
                        <a href="categorymanager.php" class="dropdown-item">CATEGORY</a>
                        <a href="suppliermanager.php" class="dropdown-item">SUPPLIER</a>
                        <a href="productmanager.php" class="dropdown-item">PRODUCTS</a>
                        <a href="storemanager.php" class="dropdown-item">STORES</a>
                    </div>
                </div>           
                    <a href="searchadmin.php" class="nav-link ">SEARCH</a>                 
                </div>
                <div class="navbar-nav ms-auto">
                <div class="box">
                        <div class="container-4">
                        <a class="text-reset me-3" href="cartadmin.php">
                          <i class="fas fa-shopping-cart"></i>
                        </a>
                        </div>
                    </div>
                
						<?php
						session_start();
						if(isset($_SESSION['user_name'])):
                            $username = $_SESSION['user_name'];
						?>	 
						<a class="nav-link" style="color:red;text-decoration:"> Admin <?=$_SESSION['user_name']?></a>
						<a href="logout.php" class="nav-link">Logout</a>
						<?php 
						else :		
						?>
						<a href="login.php" class="nav-link">Login</a>
						<a href="register.php" class="nav-link">Register</a>
						<?php
						endif;
						?>
			
                   
                </div>
            </div>
           
        </div>
    </nav>






