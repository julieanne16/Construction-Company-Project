<?php require_once 'includes/header.php'?>

    <main>
        <div class="form">
		  <h1>SIGN IN</h1>
          <p>Please fill your email and password to login</p>
		   <form id="login-form">
             <div class="form-group">
                 <label>Email Address</label>
                 <input type="email" name="email" placeholder="your_mail@website.com">
             </div>    
             <div class="form-group">
                 <label>Password</label>
                 <input type="password" name="password" placeholder="*******">
             </div>

             <button class="form-btn">SIGN IN</button> 
             <p>Don't have an account? <a href="#">Register here</a> </p>   
           </form>
		</div>
    </main>
<?php require_once 'includes/footer.php'?>