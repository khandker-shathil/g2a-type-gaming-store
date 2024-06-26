<?php include_once "config.php"; 
include "functions.php";?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Form</title>
<link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"/>
<!-- <link rel="stylesheet" href="/Project/css/reg_form.css" /> -->
<style>
  .gradient-custom {
/* fallback for old browsers */
background: #6a11cb;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
}
</style>
</head>
<?php include"header.php"; ?>
  <!-- <body>
    <div class="container">
      <form id="forms" action="register.php" method="POST" >
        <div class="form">
          <h2>Registration  form</h2>
            <div class="form-control">
              <label for="fname">First name:</label>
              <input type="text" name="fname" id="fname" placeholder="Enter your 1st name" autocomplete="off">
              <small>Error msg</small>
            </div>
          <div class="form-control">
            <label for="lname">Last name:</label>
            <input type="text" name="lname" id="lname" placeholder="Enter your last name" autocomplete="off">
            <small>Error msg</small>
          </div>
          <div class="form-control">
            <label for="phone">User name:</label>
            <input type="text" name="uname" id="uname" placeholder="Enter your phone number" autocomplete="off">
            <small>Error msg</small>
          </div>
          <div class="form-control">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" autocomplete="off">      
            <small>Error msg</small>
          </div>
          <div class="form-control">
            <label for="password">Password:</label>
            <input type="Password" name="password" id="password" placeholder="Enter your password"autocomplete="off">
            <small>Error msg</small>
            <br>
          </div>
          <div class="form-control">
            <label for="cpassword">Retype your password:</label>
            <input type="Password" name="cpassword" id="cpassword" placeholder="Retype your password" autocomplete="off">      
            <small>Error msg</small>
          </div>
          <div>   
            <br> 
            <input id="check" type="checkbox" onclick="enable()"/>
            <label for="checkbox"> I agree to these <a href="#">Terms and Conditions</a>.</label>
          </div>
          <button type="submit" disabled="true" id="btn" name="submit">Submit</button><br>
          <a href="/Project/index.php">Go Back.</a>
        </div>  
      </form>
    </div> -->
    <section class="vh-150 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase">Registration</h2>
              <p class="text-white-50 mb-5">Please fill in the required information to register.</p>

              <form id="registration-form" method="POST">
                <div class="form-outline form-white mb-4">
                  <input type="text" name="fname" id="fname" class="form-control form-control-lg" required />
                  <label class="form-label" for="fname">First Name</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="text" name="lname" id="lname" class="form-control form-control-lg" required />
                  <label class="form-label" for="lname">Last Name</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="text" name="uname" id="uname" class="form-control form-control-lg" required />
                  <label class="form-label" for="uname">Username</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="email" name="email" id="email" class="form-control form-control-lg" required />
                  <label class="form-label" for="email">Email</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" name="password" id="password" class="form-control form-control-lg" required />
                  <label class="form-label" for="password">Password</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" name="cpassword" id="cpassword" class="form-control form-control-lg" required />
                  <label class="form-label" for="cpassword">Confirm Password</label>
                </div>

                <button name="submit" class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>
              </form>
            </div>

            <div>
              <p class="mb-0">Already have an account? <a href="login.php" class="text-white-50 fw-bold">Login</a>
              </p>
            </div>
            <?php registerFunction();?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  
  <script>
  const form=document.getElementById('forms');
  const fname=document.getElementById('fname');
  const lname=document.getElementById('lname');
  const phone=document.getElementById('phone');
  const email=document.getElementById('email');
  const password=document.getElementById('password');
  const cpassword=document.getElementById('cpassword');
  function showError(input,message){
      const formControl=input.parentElement;
      formControl.className='form-control error';
      const small=formControl.querySelector('small');
      small.innerText=message;
  }
  function enable(){
    var check=document.getElementById("check");
    var btn=document.getElementById("btn");
    if(check.checked){
      btn.removeAttribute("disabled");
    }
    else{
      btn.disabled="true";
    }
  }
  //show success outline
  function showSuccess(input){
      const formControl=input.parentElement;
      formControl.className='form-control success';
  }
  function isvalidEmail(email){
  const re =/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  return re.test(String(email).toLowerCase());
  }
  function checkpasswordmatch(input1,input2)
  {
      if(input1.value!=input2.value){
          showError(input2,'password do not match');
      }
    
  }

  function checkPassword(password)
  {
      // Regex pattern to match at least one uppercase letter
      const uppercase = /[A-Z]/;
      // Regex pattern to match at least one special character
      const specialChar = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/;
    
      // Check if password contains at least one uppercase letter and one special character
      return (uppercase.test(password) && specialChar.test(password)) 
    
  }

  form.addEventListener('submit',function(e){
  // e.preventDefault();
  
    if(fname.value==='')
    {
    showError(fname,'First name is required');
    }
    else  {
      showSuccess(fname);
    }
    if(lname.value==='')
    {
      showError(lname,'Last name is required');
    }
    else
    {
      showSuccess(lname);
    }
    if(phone.value==='')
    {
      showError(phone,'Phone number required');
    }
    else if(phone.value.length !=14)
  {
    showError(phone,'phone length must be 11 numbers');
  }
    else
    {
      showSuccess(phone);
    }
    if(email.value==='')
    {
      showError(email,'Email is required');
    }
    else if(!isvalidEmail(email.value)){
  showError(email,'Email isnt valid');
    }else
    {
      showSuccess(email);
    }
    if(password.value==='')
    {
      showError(password,'Password is required');
    }
    else if(password.value.length< 8)
    {
      showError(password,'Password must be greater than 7');
    }
    else if(password.value.length>11)
    {
  showError(password,'Password must be less than 12');
    }
    else if(!checkPassword(password.value))
    {
      showError(password,'Password must contain a uppercase and special character ')
      
    }
    else
    {
      showSuccess(password);
    }
    if(cpassword.value==='')
    {
      showError(cpassword,'Retyping the password is required');
    }

    else
    {
      showSuccess(cpassword);
    }


    //passlength(password, 5, 15);
    //checkemail(email);
    checkpasswordmatch(password,cpassword);
  })</script>

  </body>
</html>