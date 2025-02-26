<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if (isset($_SESSION['status'])) {
  if ($_SESSION['status'] == "login") {
    header("location:.");
  }
}
?>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; SIDESA.MY.ID</title>
  <!--  -->
  <!-- ================== CSS STYLE ================== -->
  <!--  -->
  <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <!--  -->
  <!-- ================== GOOGLE TAG MANAGER ================== -->
  <!--  -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-94034622-3');
  </script>
</head>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>
            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="#" class="needs-validation" novalidate="">
                  <!--  -->
                  <!-- ================== USERNAME ================== -->
                  <!--  -->
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Mohon masukkan email anda
                    </div>
                  </div>
                  <!--  -->
                  <!-- ================== PASSWORD ================== -->
                  <!--  -->
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      Mohon masukkan password anda
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                <!--  -->
                <!-- ================== AKSI CEK LOGIN ================== -->
                <!--  -->
                <?php
                require('../db/Aksi.php');
                if (!empty($_POST)) {
                  $aksi = new Aksi();
                  $login = $aksi->login($_POST['email'], $_POST['password']);
                  if ($login->num_rows > 0) {
                    $array = $login->fetch_array(MYSQLI_BOTH);
                    $_SESSION['status'] = "login";
                    $_SESSION['id_user'] = $array['id_user'];
                    // $_SESSION['name'] = $array['name'];
                    $_SESSION['email'] = $array['email'];
                    $_SESSION['photo'] = $array['photo'];
                    header('location:.');
                  } else {
                    $_SESSION['status'] = "tidak_login";
                    echo ('<script>alert("Username atau password anda salah!");</script>');
                  }
                }
                ?>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; <span><a href="https://sidesa.my.id">SIDESA.MY.ID</a></span> <?php echo (date("Y")); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="../assets/modules/jquery.min.js"></script>
  <script src="../assets/modules/popper.js"></script>
  <script src="../assets/modules/tooltip.js"></script>
  <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../assets/modules/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
</body>

</html>