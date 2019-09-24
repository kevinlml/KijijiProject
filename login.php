<?php
require_once 'dbconfig.php';

include_once 'clsMember.php';
$member = new MEMBER($DB_con);

if($member->is_loggedin()!="")
{
    $member->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if($member->login($email,$password))
    {
        $member->redirect('home.php');
    }
    else
    {
        $error = "Wrong Details !";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Jumbotron Template · Bootstrap</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/jumbotron/">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="styles\styles.css">

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg clr">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php"><strong>Home</strong> <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <div class="dropdown show">
              <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Language
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">French</a>
                <a class="dropdown-item" href="#">English</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php"><strong>Login</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php"><strong>Suscribe</strong></a>
          </li>
          <li class="nav-item">
            <div class="dropdown show">
              <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Vehicles</a>
                <a class="dropdown-item" href="#">Technologie</a>
                <a class="dropdown-item" href="#">Books</a>
                <a class="dropdown-item" href="#">Clothing</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <section class="jumbotron text-center login-section">
    <div class="container">
      <div class="login-form">
          <form method="post">
            <h2>Log in.</h2>
                    <?php
            if(isset($error))
            {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                  </div>
                  <?php
            }
            ?>
            <div class="form-group">
             <input type="text" class="form-control" name="email" placeholder="Email" required />
            </div>
            <div class="form-group">
             <input type="password" class="form-control" name="password" placeholder="Password" required />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
             <button type="submit" name="btn-login" class="btn btn-block btn-primary">
                 <i class="glyphicon glyphicon-log-in"></i>&nbsp;Log in
                </button>
            </div>
              <br />
            <label>Create an account <a href="register.php">Register</a></label>
        </form>
      </div>
    </div>
  </section>

</body>
<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">Your Stuff of Sale! 2019</span>
  </div>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>
