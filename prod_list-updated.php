<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construction Company</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="prod_list-updated.css">
   <script src="https://kit.fontawesome.com/0ebd665efa.js" crossorigin="anonymous" defer></script>
</head>
<body>
	  <header class="header">
        <div class="logo"><a href="#">Construction<span> Co.</span></a></div>
        <nav class="nav">
            <a href="#login">LOGIN</a>
            <a href="#register">REGISTER</a>
            <a href="#contact">CONTACT US</a>
            <a href="#product">PRODUCTS</a>
            <a href="#about">ABOUT US</a>
            <a href="#home">HOME</a>  
        </nav>
        <div class="icon-header">
            <i class="fa-solid fa-magnifying-glass"></i>
            <i class="fa-solid fa-basket-shopping"></i>
        </div>
        <div class="menu-btn">
            <i class="fas fa-bars"></i>
        </div>
    </header>

    <main>
        <div class="container">
                <div class="products">
                    <h1>PRODUCTS</h1>
                        <div class="con-items">
                            <button class="conbtn" onclick="openList(event, 'all')" id="defaultOpen">ALL</button>
                            <button class="conbtn" onclick="openList(event, 'gravel')" id="defaultOpen">GRAVEL</button>
                            <button class="conbtn" onclick="openList(event, 'cement')" id="defaultOpen">CEMENT</button>
                            <button class="conbtn" onclick="openList(event, 'pipes')" id="defaultOpen">PIPES</button>
                            <button class="conbtn" onclick="openList(event, 'paint')" id="defaultOpen">PAINT</button>
                            <button class="conbtn" onclick="openList(event, 'plyboard')" id="defaultOpen">PLYBOARD</button>
                            <button class="conbtn" onclick="openList(event, 'cinderblock')" id="defaultOpen">CINDERBLOCK</button>
                    </div>
                    <p>Showing ALL products</p>

                <div id="all" class="list">
                    <div class="product-details">
                        <div class="card">
                            <div class="image cement">
                                <img src="images/cement-sack-img.png">
                            </div>
                           <p>CEMENT</p>
                            <div class="title">
                                <h2>ORDINARY PORTLAND CEMENT 40kg</h2>
                                <p>₱261.00</p>
                            </div>

                                <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image cement">
                                <img src="images/cement-sack-img.png">
                            </div>
                            <p>CEMENT</p>
                            <div class="title">
                                <h2>PORTLAND POZZOLONA CEMENT 40kg</h2>
                                <p>₱280.00</p>
                            </div>

                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                             <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image cement">
                                <img src="images/cement-sack-img.png">
                            </div>
                            <p>CEMENT</p>
                            <div class="title">
                                <h2>RAPID HARDENING CEMENT 40kg</h2>
                                <p>₱274.00</p>
                            </div>

                            <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                            <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image cement">
                                <img src="images/cement-sack-img.png">
                            </div>
                            <p>CEMENT</p>
                            <div class="title">
                                <h2>LOW HEAT CEMENT 40kg</h2>
                                <p>₱290.00</p>
                            </div>

                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image gravel">
                                <img src="images/Gravel-img.png">
                            </div>
                            <p>GRAVEL</p>
                            <div class="title">
                                <h2>MEXICAN BEACH PEBBLE 3/4"(1cbm)</h2>
                                <p>₱1,550.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image gravel">
                                <img src="images/Gravel-img.png">
                            </div>
                            <p>GRAVEL</p>
                            <div class="title">
                                <h2>PEA GRAVEL 3/8"(1cbm)</h2>
                                <p>₱1,680.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image gravel">
                                <img src="images/Gravel-img.png">
                            </div>
                            <p>GRAVEL</p>
                            <div class="title">
                                <h2>RIP RAP 5/9"(1cbm)</h2>
                                <p>₱900.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image gravel">
                                <img src="images/Gravel-img.png">
                            </div>
                            <p>GRAVEL</p>
                            <div class="title">
                                <h2>RIVER JACK 3/4"(1cbm)</h2>
                                <p>₱1,050.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image pipes">
                                <img src="images/metal-pipes-img.png">
                            </div>
                            <p>PIPES</p>
                            <div class="title">
                                <h2>CARBON STEEL PIPE 1m</h2>
                                <p>₱2,000.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image pipes">
                                <img src="images/metal-pipes-img.png">
                            </div>
                            <p>PIPES</p>
                            <div class="title">
                                <h2>CAST IRON PIPE 1m</h2>
                                <p>₱1,800.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image pipes">
                                <img src="images/metal-pipes-img.png">
                            </div>
                            <p>PIPES</p>
                            <div class="title">
                                <h2>GALVANIZED STEEL PIPE 1m</h2>
                                <p>₱3,000.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image pipes">
                                <img src="images/metal-pipes-img.png">
                            </div>
                            <p>PIPES</p>
                            <div class="title">
                                <h2>GALVANIZED IRON PIPE 1m</h2>
                                <p>₱2,800.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image pipes">
                                <img src="images/metal-pipes-img.png">
                            </div>
                            <p>PIPES</p>
                            <div class="title">
                                <h2>CEMENT PIPE 1m</h2>
                                <p>₱4,000.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image paint">
                                <img src="images/paint-img.png">
                            </div>
                            <p>PAINT</p>
                            <div class="title">
                                <h2>ENAMEL PAINT 1gal</h2>
                                <p>₱2,500.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image paint">
                                <img src="images/paint-img.png">
                            </div>
                            <p>PAINT</p>
                            <div class="title">
                                <h2>OIL PAINT 1gal</h2>
                                <p>₱2,450.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>
                    </div>
                </div>

                <div id="gravel" class="list">
                    <div class="product-details">
                        <div class="card">
                            <div class="image gravel">
                                <img src="images/Gravel-img.png">
                            </div>
                            <p>GRAVEL</p>
                            <div class="title">
                                <h2>MEXICAN BEACH PEBBLE 3/4"(1cbm)</h2>
                                <p>₱1,550.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image gravel">
                                <img src="images/Gravel-img.png">
                            </div>
                            <p>GRAVEL</p>
                            <div class="title">
                                <h2>PEA GRAVEL 3/8"(1cbm)</h2>
                                <p>₱1,680.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image gravel">
                                <img src="images/Gravel-img.png">
                            </div>
                            <p>GRAVEL</p>
                            <div class="title">
                                <h2>RIP RAP 5/9"(1cbm)</h2>
                                <p>₱900.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image gravel">
                                <img src="images/Gravel-img.png">
                            </div>
                            <p>GRAVEL</p>
                            <div class="title">
                                <h2>RIVER JACK 3/4"(1cbm)</h2>
                                <p>₱1,050.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>
                    </div>
                </div>

                <div id="cement" class="list">
                    <div class="product-details">
                        <div class="card">
                            <div class="image cement">
                                <img src="images/cement-sack-img.png">
                            </div>
                           <p>CEMENT</p>
                            <div class="title">
                                <h2>ORDINARY PORTLAND CEMENT 40kg</h2>
                                <p>₱261.00</p>
                            </div>

                                <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image cement">
                                <img src="images/cement-sack-img.png">
                            </div>
                            <p>CEMENT</p>
                            <div class="title">
                                <h2>PORTLAND POZZOLONA CEMENT 40kg</h2>
                                <p>₱280.00</p>
                            </div>

                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                             <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image cement">
                                <img src="images/cement-sack-img.png">
                            </div>
                            <p>CEMENT</p>
                            <div class="title">
                                <h2>RAPID HARDENING CEMENT 40kg</h2>
                                <p>₱274.00</p>
                            </div>

                            <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                            <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image cement">
                                <img src="images/cement-sack-img.png">
                            </div>
                            <p>CEMENT</p>
                            <div class="title">
                                <h2>LOW HEAT CEMENT 40kg</h2>
                                <p>₱290.00</p>
                            </div>

                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>
                </div>

                <div id="pipes" class="list">
                    <div class="product-details">
                        <div class="card">
                            <div class="image pipes">
                                <img src="images/metal-pipes-img.png">
                            </div>
                            <p>PIPES</p>
                            <div class="title">
                                <h2>CARBON STEEL PIPE 1m</h2>
                                <p>₱2,000.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image pipes">
                                <img src="images/metal-pipes-img.png">
                            </div>
                            <p>PIPES</p>
                            <div class="title">
                                <h2>CAST IRON PIPE 1m</h2>
                                <p>₱1,800.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image pipes">
                                <img src="images/metal-pipes-img.png">
                            </div>
                            <p>PIPES</p>
                            <div class="title">
                                <h2>GALVANIZED STEEL PIPE 1m</h2>
                                <p>₱3,000.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image pipes">
                                <img src="images/metal-pipes-img.png">
                            </div>
                            <p>PIPES</p>
                            <div class="title">
                                <h2>GALVANIZED IRON PIPE 1m</h2>
                                <p>₱2,800.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image pipes">
                                <img src="images/metal-pipes-img.png">
                            </div>
                            <p>PIPES</p>
                            <div class="title">
                                <h2>CEMENT PIPE 1m</h2>
                                <p>₱4,000.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>
                    </div>
                </div>

                <div id="paint" class="list">
                    <div class="product-details">
                        <div class="card">
                            <div class="image paint">
                                <img src="images/paint-img.png">
                            </div>
                            <p>PAINT</p>
                            <div class="title">
                                <h2>ENAMEL PAINT 1gal</h2>
                                <p>₱2,500.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>

                        <div class="card">
                            <div class="image paint">
                                <img src="images/paint-img.png">
                            </div>
                            <p>PAINT</p>
                            <div class="title">
                                <h2>OIL PAINT 1gal</h2>
                                <p>₱2,450.00</p>
                            </div>
                             <button class="cart-btn">Add to cart <i class="fa-solid fa-basket-shopping"></i></button>
                                <button class="view-btn">View details  <i class="fa-solid fa-circle-info"></i></button>
                        </div>
                    </div>
                </div>
                    </div>
                </div>

                <div id="plyboard" class="list">
                    <div class="product-details"></div>
                </div>

                <div id="cinderblock" class="list">
                    <div class="product-details"></div>
                </div>

            </div>

            <script>
                function openList(evt, listName) {
                  var i, list, conbtn;
                  list = document.getElementsByClassName("list");
                  for (i = 0; i < list.length; i++) {
                    list[i].style.display = "none";
                  }
                  conbtn = document.getElementsByClassName("conbtn");
                  for (i = 0; i < conbtn.length; i++) {
                    conbtn[i].className = conbtn[i].className.replace(" active", "");
                  }
                  document.getElementById(listName).style.display = "block";
                  evt.currentTarget.className += " active";
                }

                // Get the element with id="defaultOpen" and click on it
                document.getElementById("defaultOpen").click();
            </script>
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
