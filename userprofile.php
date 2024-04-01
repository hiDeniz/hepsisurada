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

  <section class="shop_section" style = "background-color: white">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Your Profile
        </h2>
      </div>
      <div class="">
        <?php
        include "config.php";
        $userID = 1;   // Change the value of the userid in order to get that user profile
        $sql_command = "SELECT * FROM users WHERE uid = $userID";
        $myresult = mysqli_query($db, $sql_command);
        while ($row = mysqli_fetch_assoc($myresult)) {
          $name = $row['uName'];
          $surname = $row['uSurname'];
          $age = $row['uAge'];
          $email = $row['uEmail'];
          $phoneNumber = $row['uPhoneNumber'];
          $sex = $row['uSex'];
          echo "<div class='col-md-6' style = 'padding-bottom: 50px'>
          <div class='detail-box'>
            <div class='heading_container '>
              <h2>
                $name $surname
              </h2>
            </div>
            <h4>
              Age: $age
            </h4>
            <h4>
              Email: $email
            </h4>
            <h4>
              Phone Number: $phoneNumber
            </h4>
          </div>
        </div>";

        $sql_command = "SELECT a.aCity, a.aCountry, a.aZipCode, a.aStreet
        FROM users u
        JOIN has h ON u.uid = h.uid
        JOIN addresses a ON h.aid = a.aid
        WHERE u.uid = $userID";
        $myresult = mysqli_query($db, $sql_command);
        echo "<div class='col' >
          <div class='detail-box' style = 'padding-bottom: 25px'>
            <div class='heading_container' >
              <h2>
                Addresses
              </h2>
            </div>
        </div>";


        $addressCounter = 1;
        while ($row = mysqli_fetch_assoc($myresult)) {
          $city = $row['aCity'];
          $country = $row['aCountry'];
          $zipCode = $row['aZipCode'];
          $street = $row['aStreet'];
        
          echo "<div class='row'>
          <div class=''>
          <div class='detail-box' style = 'padding-left: 10px; padding-right: 50px'>
            <div class='heading_container'>
              <h3 style = 'color: #3b4a6b; font-weight: 600;'>
                Address  $addressCounter
              </h3>
            </div>
            <h4>
              City: $city
            </h4>
            <h4>
              Country: $country
            </h4>
            <h4>
              Zip Code: $zipCode
            </h4>
            <h4>
              Street: $street
            </h4>
          </div>
        </div>";
          $addressCounter++;
        }

        }
        
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

