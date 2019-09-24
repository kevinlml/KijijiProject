<?php
include_once 'dbconfig.php';
include_once 'clsMember.php';
$member = new MEMBER($DB_con);
if(!$member->is_loggedin())
{
    $member->redirect('index.php');
}
$member_id = $_SESSION['member_id'];
$stmt = $DB_con->prepare("SELECT * FROM member WHERE member_id=:member_id");
$stmt->execute(array(":member_id"=>$member_id));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
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
           <li class="nav-item active">
            <a class="nav-link" href="payment.php"><strong>Payment</strong> <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="postads.php"><strong>Post</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewads.php"><strong>View</strong></a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="logout.php"><strong>Logout</strong></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <section style="height: 450px" class="jumbotron text-center login-section">

<div class="content">
<h1 style="color:white">Welcome : <?php print($row['name']); ?></h1>
<h2 style="color:white">You are ready to post your AD</h2>
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