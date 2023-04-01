<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construction Company</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="settings.css">
   <script src="https://kit.fontawesome.com/0ebd665efa.js" crossorigin="anonymous" defer></script>
</head>
<body>
	  <header class="header">
        <div class="logo"><a href="#">Construction<span> Co.</span></a></div>
        <nav class="nav">
            <a href="#signin">CONTACT US</a>
            <a href="#about">PRODUCTS</a>
            <a href="#product">ABOUT US</a>
            <a href="#home">HOME</a>  
        </nav>
        <div class="icon-header">
            <i class="fa-solid fa-magnifying-glass"></i>
            <i class="fa-solid fa-circle-user"></i>
            <i class="fa-solid fa-basket-shopping"></i>
        </div>
        <div class="menu-btn">
            <i class="fas fa-bars"></i>
        </div>
    </header>

    <main>
        <div class="title">
                <i class="fa-solid fa-user-gear"></i>
                <h1>SETTINGS</h1>
            </div>
        <div class="container">
            <div class="tab">
              <button class="tablinks" onclick="openPage(event, 'Info')" id="defaultOpen"><i class="fa-solid fa-circle-user"></i> CHANGE PERSONAL INFO</button>
              <button class="tablinks" onclick="openPage(event, 'Email')"><i class="fa-solid fa-envelope"></i> CHANGE EMAIL</button>
              <button class="tablinks" onclick="openPage(event, 'Password')"><i class="fa-solid fa-lock"></i>   CHANGE PASSWORD</button>
            </div>
    
                <div id="Info" class="tabcontent">
                    <div class="form">
                            <form>
                                <div class="form-group">
                                    <label>First Name *</label>
                                    <input type="f-name" name="f-name" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <label>Last Name *</label>
                                    <input type="l-name" name="l-name" placeholder="Last Name">
                                </div>  
                                <div class="form-group">
                                    <label>Contact Number *</label>
                                    <input type="contact" name="contact" placeholder="Contact Number">
                                </div>

                                <button class="form-btn">SAVE CHANGES</button> 
                                <button class="form-btn-cancel">CANCEL</button> 
                            </form>  
                    </div>
                </div>

                <div id="Email" class="tabcontent">
                        <div class="form">
                            <form>
                                <div class="form-group">
                                    <label>Current Email Address *</label>
                                    <input type="email" name="email" placeholder="Current Email Address">
                                </div>
                                <div class="form-group">
                                    <label>New Email Address *</label>
                                    <input type="new-email" name="new-email" placeholder="New Email Address">
                                </div>  

                                <button class="form-btn">SAVE CHANGES</button> 
                                <button class="form-btn-cancel">CANCEL</button> 
                            </form>
                        </div>  
                </div>

                <div id="Password" class="tabcontent">
                  <div class="form">
                            <form>
                                <p>Password must be atleast 6 characters</p>
                                <div class="form-group">
                                    <label>Current Password *</label>
                                    <input type="c-pass" name="c-pass" placeholder="Current Password">
                                </div>
                                <div class="form-group">
                                    <label>New Password *</label>
                                    <input type="n-pass" name="n-pass" placeholder="New Password">
                                </div>  
                                <div class="form-group">
                                    <label>Confirm New Password *</label>
                                    <input type="con-pass" name="con-pass" placeholder="Confirm New Password">
                                </div>

                                <button class="form-btn">SAVE CHANGES</button> 
                                <button class="form-btn-cancel">CANCEL</button> 
                            </form>  
                    </div>
            </div>

            <script>
                function openPage(evt, pageName) {
                  var i, tabcontent, tablinks;
                  tabcontent = document.getElementsByClassName("tabcontent");
                  for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                  }
                  tablinks = document.getElementsByClassName("tablinks");
                  for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                  }
                  document.getElementById(pageName).style.display = "block";
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
