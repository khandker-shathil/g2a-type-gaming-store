
<!DOCTYPE html>
<html>
<head>
<link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"/>
<!-- <link rel="stylesheet" href="/Project/css/Login.css"/> -->
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
<body>
<?php include"header.php";?>
<!-- <div class="container">
  <form id="forms"action="login1.php" method="POST" >
      <div class="form">
        <h2>Login</h2>
        <div class="form-control">
          <label for="email">Email:</label>
          <input type="text" name="email" id="email" placeholder="Enter email" autocomplete="off">
        </div>
        <div class="form-control">
          <label for="password">Password:</label>
          <input type="password" name="password" id="password" placeholder="Enter password" autocomplete="off">
        </div>
          <button name="user_submit"  id="btn">Submit</button>
          <p>Click here for log out <a href="Logout.php">Logout</a> </p>
        </div>
      </div>
  </form>
</div> -->
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>

              <form id="login-form" method="POST" action="login1.php">
                <div class="form-outline form-white mb-4">
                  <input type="email" name="email" id="typeEmailX" class="form-control form-control-lg" required />
                  <label class="form-label" for="typeEmailX">Email</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" required />
                  <label class="form-label" for="typePasswordX">Password</label>
                </div>

                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                <button name="user_submit" class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                  <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                  <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                  <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                </div>
              </form>
            </div>

            <div>
              <p class="mb-0">Don't have an account? <a href="registration_form.php" class="text-white-50 fw-bold">Sign Up</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  <script>
    const form=document.getElementById('forms');
    const email=document.getElementById('email');
    const password=document.getElementById('password');
  form.addEventListener('submit',function(e){
    //e.preventDefault();
    if(email.value==='')
    { 
    alert('email is required');
    }
    else if(password.value==='')
    {
      alert('password is required');
    }});
  </script>
</body>
</html>