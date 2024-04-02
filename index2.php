<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   <link rel="stylesheet" href="css/style.css"/>
   <title>ร้านกระเป๋า shop</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid px-5">
            <a class="navbar-brand" href="index1.php"><span class="text-warning fw-bold">MK BAG</span> Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="collect.php">สินค้าแนะนำ</a>
                    </li>

                   
                </ul>
          
                
            </div>
        </div>
    </nav>
<div class="carousel_container">
<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/Screenshot 2023-10-19 190347.jpg" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://www.charleskeith.co.th/on/demandware.static/-/Library-Sites-CharlesKeithTH/default/dweb6c456d/images/plp/charles-keith-pcp-top-banner-fall-23-all-desktop-1820x300.jpg" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/Screenshot 2023-10-19 191120.jpg" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
<div class="container">
      <h3 class="fw-bold "> MK BAG SHOP </h3>
<form method="post" action="">
      <input type="text" name="kw" class="btn-dark my-2"  <br>
      <input type="submit" name="Submit" value="ค้นหา" class="btn btn-primary my-2"
       >
       <a class="btn btn-secondary text-white" href="insert1.php" role="button" >
<span class="glyphicon glyphicon-shopping-cart"></span>เพิ่มสินค้า</a>
       <a class="btn btn-success text-white" href="insert2.php" role="button" >
<span class="glyphicon glyphicon-shopping-cart"></span>เพิ่มประเภท</a>
<a class="btn btn-info text-white" href="insert3.php" role="button" >
<span class="glyphicon glyphicon-shopping-cart"></span>เพิ่มสี</a>
       </form>

        <div class="row mt-5 mb-5">  
        <?php
 include("connectdb.php");
 $kw = $_POST['kw'];
 $sql = "SELECT * FROM `products` WHERE (`p_name` LIKE '%{$_POST['kw']}%' OR `p_detail` LIKE '%{$_POST['kw']}%' ) ";
 $sql2 = "SELECT * FROM `category` WHERE (`c_name` LIKE '%{$_POST['kw']}%' ) ";
 $rs = mysqli_query($conn,$sql);
 while ($data = mysqli_fetch_array($rs)){
	 ?>  
            <div class="b_card mx-2 shadow p-3 mt-4 "
              <h4 class="fw-bold"><?=$data['p_name'];?></h4>
                <div class="fill">
                  <img src="images/<?=$data['p_id'];?>.<?=$data['p_img'];?> " width="150" height="200" alt="">
                </div>
                <p><?=$data['p_name'];?></p>
                <div class="d-flex justify-content-between">
                <h5 class="fw-bold text-warning">฿<?=$data['p_price'];?> </h5>
                  <a class="btn btn-success text-white" href="update.php?id=<?=$data['p_id'];?>" role="button" >
<span class="glyphicon glyphicon-shopping-cart"></span>แก้ไขสินค้า</a>

<a class="btn btn-danger text-white" href="delete.php?id=<?=$data['p_id'];?>"<span class="glyphicon glyphicon-shopping-cart"></span>ลบสินค้า</a>

               
<br>
 </div>

</div>
            
 <?php
        }

mysqli_close($conn); //ปิดการเชื่อมต่อข้อมูล
 ?>
      <hr>
        <p>Group MBS</p>
    </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>