<?php
require_once 'dbconfig.php';

include_once 'clsPayment.php';
$payment = new Payment($DB_con);
if(isset($_POST['btn-adpayment']))
{
    $cardName = trim($_POST['cardName']);
    $cardType = trim($_POST['cardType']);
    $cardNumber = trim($_POST['cardNumber']);
    $cardCvc = trim($_POST['cardCvc']);
    $expiredMonth = trim($_POST['expiredMonth']);
    $expiredYear = trim($_POST['expiredYear']);
    $idmember = trim($_SESSION['member_id']);
       
    if($cardName=="") {
        $error[] = "provide Card Name !";
    }
    
    else
    {
        if($payment->register($cardName,$cardType,$cardNumber,$cardCvc,$expiredMonth, $expiredYear, $idmember))
        {
           $payment->redirect('home.php?');
        }                
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

  <section class="jumbotron text-center login-section">
 
<div class="container">
     <div class="register-form">
        <form method="post">
            <h2>Register your Payment Method</h2>
            <?php
            if(isset($error))
            {
               foreach($error as $error)
               {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                  </div>
                  <?php
               }
            }
            else if(isset($_GET['joined']))
            {
                 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Payment successfully registered
                 </div>
                 <?php
            }
            ?>
            <div class="form-group">
            <input type="text" class="form-control" name="cardName" placeholder="Cardholder Name" value="<?php if(isset($error)){echo $cardName;}?>" required />
            </div>

            <div class="form-group">
             <select class="form-control" name="cardType" value="<?php if(isset($error)){echo $cardType;}?>">
                <option>Card Type</option>
                <option value="01">Debit</option>
                <option value="02">Credit</option>
              </select>
            
            </div>

 			<div class="row">
             <div class="form-group col-sm-9">
            <input type="text" class="form-control" name="cardNumber" placeholder="Card Number" value="<?php if(isset($error)){echo $cardNumber;}?>" />
            </div>

            <div class="form-group col-sm-3">
            <input type="text" class="form-control" name="cardCvc" placeholder="Card CVC" value="<?php if(isset($error)){echo $cardCvc;}?>" />
            </div>
            </div>

 			<div class="row">
             <div class="form-group col-sm-8">
              <select class="form-control" name="expiredMonth" value="<?php if(isset($error)){echo $expiredMonth;}?>" >
                <option>Expired Month</option>
                <option value="01">Jan (01)</option>
                <option value="02">Feb (02)</option>
                <option value="03">Mar (03)</option>
                <option value="04">Apr (04)</option>
                <option value="05">May (05)</option>
                <option value="06">June (06)</option>
                <option value="07">July (07)</option>
                <option value="08">Aug (08)</option>
                <option value="09">Sep (09)</option>
                <option value="10">Oct (10)</option>
                <option value="11">Nov (11)</option>
                <option value="12">Dec (12)</option>
              </select>
               </div>
            
       		<div class="form-group col-sm-4">
              <select class="form-control" name="expiredYear" value="<?php if(isset($error)){echo $expiredYear;}?>" >
                <option value="19">2019</option>
                <option value="20">2020</option>
                <option value="21">2021</option>
                <option value="22">2022</option>
                <option value="23">2023</option>
                <option value="24">2024</option>
                <option value="25">2025</option>
              </select>
               </div>
                </div>

            <div class="clearfix"></div>
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-success" name="btn-adpayment">Submit</button>
            </div>
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