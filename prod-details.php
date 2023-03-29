<?php
require_once 'functions.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construction Company</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="prod-details.css">
   <script src="https://kit.fontawesome.com/0ebd665efa.js" crossorigin="anonymous" defer></script>
</head>
<body>
    
<?php require_once 'includes/header.php'; ?>

    <main>
        <div class="container">
            <div class="prod_det">
                <div class="row">
                    <div class="column left">
                        <div class="prod_img">
                            <img src="images/Gravel-img.png">
                        </div>
                    </div>

                    <div class="column right">
                            <h2>MEXICAN BEACH PEBBLE 3/4"(1cbm)</h2>
                                <div class="price">
                                    <p>₱1,500.00</p>
                                </div>
                            <p>Category:&nbsp;&nbsp;&nbsp;<span style="color: #364A46; font-weight:500;">Gravel</span></p>
                            <p>SKU:&nbsp;&nbsp;&nbsp;<span style="color: #364A46; font-weight:500;">123XYZ</span></p>
                            <p>Stock:&nbsp;&nbsp;&nbsp;<span style="color: #364A46; font-weight:500;">120</span></p>

                            <div class="quantity">
                                <p>Quantity:&nbsp;&nbsp;&nbsp;
                                    <button class="minus_plus">-</button>
                                    <span class="number">&nbsp;1&nbsp;</span>
                                    <button class="plus_minus">+</button>
                                </p>
                            </div>

                            <div class="cart-btn">
                                <button>ADD TO CART</button>
                            </div>
                    </div>
                </div>

                <div class="box">
                    <div class="details">
                        <div class="sub-title">
                            <h2>- Product Details</h2>
                        </div>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, Mmaking it over 2000 years old. Richard McClintock, a latin professor at Hampden-Sydney College in Virginia.<br><br></p>

                         <div class="sub-title">
                            <h2>- Specifications</h2>
                        </div>
                        <p>&nbsp;&nbsp;&nbsp;Brand: XYZ<br><br></p>
                        <p>&nbsp;&nbsp;&nbsp;Sub Brand: Abc<br><br></p>
                        <p>&nbsp;&nbsp;&nbsp;Color:Assorted<br><br></p>
                        <p>&nbsp;&nbsp;&nbsp;Type:River Rock</p>
                    </div>
                </div>

                <div class="similar-prod">
                    <h2>SIMILAR PRODUCTS</h2>
                        <div class="card">
                            <div class="image">
                                <img src="images/Gravel-img.png">
                            </div>
                            <p>GRAVEL</p>
                            <div class="title">
                                <h2>MEXICAN BEACH PEBBLE 3/4"(1cbm)</h2>
                                <p>₱1,500.00</p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="image">
                                <img src="images/Gravel-img.png">
                            </div>
                            <p>GRAVEL</p>
                            <div class="title">
                                <h2>PEA GRAVEL 3/8"(1cbm)</h2>
                                <p>₱1,680.00</p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="image">
                                <img src="images/Gravel-img.png">
                            </div>
                            <p>GRAVEL</p>
                            <div class="title">
                                <h2>RIP RAP 5/9"(1cbm)</h2>
                                <p>₱900.00</p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="image">
                                <img src="images/Gravel-img.png">
                            </div>
                            <p>GRAVEL</p>
                            <div class="title">
                                <h2>RIVER JACK 3/4"(1cbm)</h2>
                                <p>₱1,050.00</p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </main>

     <footer>
        <div class="row">
          <div class="column left">
            <div class="logo"><a href="#">Construction<span> Co.</span></a></div>
            <div class="tagline">
                <p>Tagline of the Construction Company</p>
            </div>
            <div class="socmed">
                <i class="fa fa-facebook-square"></i>
                <i class="fa fa-instagram"></i>
                <i class="fa fa-linkedin-square"></i>
            </div>
          </div>
          <div class="column center">
            <h2>Head Office</h2>
            <i class='fas fa-map-marker-alt'></i>
            <p>1017 Vicente Cruz St. Sampaloc <br>Manila, Philippines</p>
            <i class='fas fa-phone-alt'></i>
            <p>+632-8831-0000</p>
            <i class='fas fa-envelope'></i>
            <p>construction.co@gmail.com</p>
          </div>
          <div class="column right">
            <h2>Site Map</h2>
            <p>Home</p>
            <p>About us</p>
            <p>Products</p>
            <p>Register</p>
            <p>Login</p>
            <p>Contact us</p>
          </div>
        </div>
            <div class="policy">
                <p>Cookie Policy</p>
                <p>Terms & Condition</p>
                <p>Privacy Policy</p>
            </div>
        <div class="footer-bottom">
            <p>Copyright &copy; Construction Co. | Designed by MAJJCS - Powered by Tech2serv</p>
        </div>
    </footer>

</body>
</html>
