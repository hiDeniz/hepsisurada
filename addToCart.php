<!DOCTYPE html>

<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>HepsiSurada</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>

<div class="" style="background-color: #394867;">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
          <img src="images/logo.png" style = "width: 225px; height: 60px;" alt="">
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <?php
              include "config.php";

              $sql_command = "SELECT cName FROM categories";
              $myresult = mysqli_query($db, $sql_command);
              while ($row = mysqli_fetch_assoc($myresult)) {
                $catName = $row['cName'];
                echo "<li class='nav-item'>
                <a class='nav-link' href='category.php?catname=$catName'> $catName </a>
              </li>";
              }
              ?>
            </ul>
            <div class="user_option-box">
            <a href="userprofile.php">
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
              <a href="shoppingCart.php">
                <i class="fa fa-cart-plus" aria-hidden="true"></i>
              </a>
              <a href="/hepsisurada/orders.php">
                <i class="nav-item">
                  <i class="nav-link" href="/hepsisurada/orders.php">My Orders</i>
                </i>
              </a>
              </a>
              <a href="/hepsisurada/php-firebase/chats.php?userID=1">         <!-- 1 is the admin id CHANGE IT IF YOU WANT TO GO TO THE PAGE OF SPECIFIC USER-->
                <i class="nav-item">
                  <i class="nav-link" href="/hepsisurada/php-firebase/chats.php?userID=1">SUPPORT</i>  <!-- 1 is the admin id CHANGE IT IF YOU WANT TO GO TO THE PAGE OF SPECIFIC USER-->
                </i>
              </a>
              <a href="/hepsisurada/adminPanel/home.html">
                <i class="nav-item">
                  <i class="nav-link" href="../home.html">Admin Panel</i>
                </i>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

<!-- shop section -->


<style>
    .total-amount-container {
  display: flex;
  flex-direction: column;
}

.total-amount {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  width: 100%;
  font-size: 18px;
  font-weight: bold;
  color: #333;
}

.checkout-button {
  display: block;
  width: 200px;
  height: 50px;
 margin: 0 0 0 auto;
  background-color: #333;
  color: #fff;
  font-size: 18px;
  font-weight: bold;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
  </style>


<!-- 
THIS PART IS NOT WORKING YET    

<script>
        document.getElementById("decrease-button").addEventListener("click", decreaseQuantity);
        document.getElementById("increase-button").addEventListener("click", increaseQuantity);
      
        function decreaseQuantity() {
            if (amount > 0) {
                <?php
                    $sql_command = "UPDATE add_to_shoppingcart
                    SET amount = amount - 1
                    WHERE uid = $userID AND pID = $productID
                    "





                ?>




              document.getElementById("amount").innerHTML = amount;
              document.getElementById("totPrice").innerHTML = totPrice;
            }
          }
      
        function increaseQuantity() {
          amount++;
          totPrice = amount * pPrice;
          document.getElementById("amount").innerHTML = amount;
          document.getElementById("totPrice").innerHTML = totPrice;
        }
      </script> -->


<section class="shop_section" style = "background-color: white;">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Your Shopping Cart
        </h2>
      </div>
      <div class="">
        <?php
        include "config.php";
        $addedProductID = $_GET['productid'];
        $userID = 1;   // Change the value of the userid in order to get that user profile

        // Check if the tuple already exists in the table
        $query = "SELECT * FROM add_to_shoppingcart WHERE uid = $userID AND pID = $addedProductID";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            // The tuple already exists, so update the amount column
            $query = "UPDATE add_to_shoppingcart SET amount = amount + 1 WHERE uid = $userID AND pID = $addedProductID";
            mysqli_query($db, $query);
          } else {
            // The tuple does not exist, so insert a new row
            mysqli_query($db, "INSERT INTO add_to_shoppingcart (uid, pID, amount) VALUES ($userID, $addedProductID, 1)");
          }



        $sql_command = "SELECT p.pID, p.pName, p.pStock, p.pAvgRating, p.pPrice, p.pDescription, sc.amount FROM users u JOIN add_to_shoppingcart sc ON u.uid = sc.uid JOIN products p ON sc.pID = p.pID WHERE u.uid = $userID";
        $myresult = mysqli_query($db, $sql_command);
        
        $totalShoppingCart = 0;
        while ($row = mysqli_fetch_assoc($myresult)) {
          $pID = $row['pID'];
          $pName = $row['pName'];
          $pPrice = $row['pPrice']; 
          $amount = $row['amount'];
          $totPrice = floatval($pPrice) * floatval($amount);
          $totalShoppingCart += $totPrice;
          echo "
          <a href='product.php?productid=$pID' style='text-decoration: none; color: black'>
          <div class='row' style='border: 1px solid black; border-radius: 10px; background-color: lightgray; margin: 10px 0' >
          
          <div class='product-container' style=' display: flex; align-items: center; width: 70%'>
            <div class='img-box'>
              <img src='images/$pID.jpg' alt='' style='border-radius: 10px; width: 100px; height: 100px;'>
            </div>
            <div class='detail-box'>
              <div class='type'>
                <h4 style = 'padding-left: 10px'>
                <button id='decrease-button' class='decrease-button'>-</button> $amount <button id='increase-button' class='increase-button'>+</button> $pName
                </h4>
              </div>
              <div class='price' style = 'padding-left: 25px; color: gray'>
                <h6>
                  $pPrice$
                </h6>
              </div>
            </div>
          </div>
          <div class='price-container' style='display: flex; align-items: center; width: 30%; justify-content: flex-end'>
            <div class='price'>
              <h6>
                $totPrice$
              </h6>
            </div>
          </div>
        </div>
        </a>
        
        
        ";
        

        }
        echo "<div class='total-amount-container'>
        <div class='total-amount'>Total Amount: $totalShoppingCart$</div>
        <a href='checkout.php'><button class='checkout-button'>Checkout</button></a>
        <br>
      </div>";
        

        ?>
        
        
        </div>
      </div>
      
    </div>
  </section>

  <!-- end shop section -->

  <!-- about section -->

  <section class="about_section layout_padding" style = "background-color: #14274E">
    <div class="container">
      <div class="row">
        <div class="">
          <div class="detail-box">
            <div class="heading_container" style="align-items:center">
              <h2>
                About Us
              </h2>
            </div>
            <h4>
              We are a group of 3 students from Sabanci University. We are taking CS306 Database Systems course. This is our basic E-Commerce website. We are learning HTML, CSS, PHP, MySQL with this project. Hope you enjoy our website! 
    </h4>
            <style>
            html {
              box-sizing: border-box;
            }

            *, *:before, *:after {
              box-sizing: inherit;
            }

            .columnx {
              float: left;
              width: 33.3%;
              margin-bottom: 16px;
              padding: 0 8px;
            }

            .cardx {
              box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
              margin: 8px;
            }

            .about-sectionx {
              padding: 50px;
              text-align: center;
              background-color: #474e5d;
              color: white;
            }

            .containerx {
              padding: 0 16px;
              background-color: #2F3B55;
            }

            .containerx::after, .row::after {
              content: "";
              clear: both;
              display: table;
            }

            .titlex {
              color: grey;
            }


            @media screen and (max-width: 650px) {
              .columnx {
                width: 100%;
                display: block;
              }
            }
            </style>
            </head>
            <body>


<h2 style="text-align:center; font-weight: bold; padding-top:20px; padding-bottom:4px">Our Team</h2>

<div class="rowx">
  <div class="columnx">
    <div class="cardx">
      <img src="images/aydinaydemirx.jpg" alt="Aydin Aydemir" style="width:100%">
      <div class="containerx">
        <h2 style="padding-top: 16px; text-align: center">Aydin Aydemir</h2>
        <p class="title" style= "text-align: center">Group Member</p>
        <p style= "text-align: center">28686</p>
        <p style= "text-align: center">aydinaydemir@sabanciuniv.edu</p>
      </div>
    </div>
  </div>

  <div class="rowx">
  <div class="columnx">
    <div class="cardx">
      <img src="images/aycaataerx.jpg" alt="Ayca Ataer" style="width:100%">
      <div class="containerx">
        <h2 style="padding-top: 16px; text-align: center">Ayca Ataer</h2>
        <p class="title" style= "text-align: center">Group Member</p>
        <p style= "text-align: center">28156</p>
        <p style= "text-align: center">aycaataer@sabanciuniv.edu</p>
      </div>
    </div>
  </div>

  <div class="rowx">
  <div class="columnx">
    <div class="cardx">
      <img src="images/halilibrahimx.jpg" alt="Halil Ibrahim Deniz" style="width:100%;">
      <div class="containerx">
        <h2 style="padding-top: 16px; text-align: center">Halil Ibrahim Deniz</h2>
        <p class="title" style= "text-align: center">Group Member</p>
        <p style= "text-align: center">28225</p>
        <p style= "text-align: center">halilibrahim@sabanciuniv.edu</p>
      </div>
    </div>
  </div>


            
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  

</body>

</html>