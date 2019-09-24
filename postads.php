<?php
require_once 'dbconfig.php';

include_once 'clsAd.php';
$ad = new Ad($DB_con);

if(isset($_POST['btn-adad']))
{
    $adTitle = trim($_POST['adTitle']);
    $adDescription = trim($_POST['adDescription']);
    $adPrice = trim($_POST['adPrice']);
    $articleQuantity = trim($_POST['articleQuantity']);
    $adPostedDate = trim($_POST['adPostedDate']);
    $adExpiredDate = trim($_POST['adExpiredDate']);
    $adPicture = trim($_POST['adPicture']);
    $idCategory = trim($_POST['categoryid']);
    $idmember = trim($_SESSION['member_id']);
    
    if($adTitle=="") {
        $error[] = "provide Ad Title";
    }
    
    else
    {
        if($ad->register($adTitle,$adDescription,$adPrice,$articleQuantity,$adPostedDate, $adExpiredDate, $adPicture, $idCategory,$idmember))
        {
            $ad->redirect('home.php?');
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
            <h2>Post your Ad here!</h2>
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
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Ad successfully posted
                 </div>
                 <?php
            }
            ?>
            <div class="form-group">
            <input type="text" class="form-control" name="adTitle" placeholder="Title of your Ad" value="<?php if(isset($error)){echo $adTitle;}?>" required />
            </div>
            
            <div class="form-group">
            <input type="text" class="form-control" name="adDescription" placeholder="Description of your Ad" value="<?php if(isset($error)){echo $adDescription;}?>" required />
            </div>
      
 			<div class="row">
             <div class="form-group col-sm-7">
            <input type="number" class="form-control" name="adPrice" placeholder="Price of your Article" value="<?php if(isset($error)){echo $adPrice;}?>" />
            </div>
               <div class="form-group col-sm-1">
               <h5><strong>$</strong></h5>
		     </div>
              <div class="form-group col-sm-4">
             <select class="form-control" name="articleQuantity" value="<?php if(isset($error)){echo $articleQuantity;}?>">
                <option>Quantity</option>
                <option value="01">1</option>
                <option value="02">2</option>
                <option value="03">3</option>
                <option value="04">4</option>
                 <option value="05">5</option>
                <option value="06">6</option>
                <option value="07">7</option>
                <option value="08">8</option>
                <option value="09">9</option>
                <option value="10">10</option>
              </select>            
            </div>
            </div>
            
           	<div class="row">
 
       		<div class="form-group col-sm-6">
            <input type="date" class="form-control"  name="adPostedDate" value="<?php if(isset($error)){echo $adPostedDate;}?>"  required />
            </div>
            <div class="form-group col-sm-6">
            <input type="date" class="form-control"  name="adExpiredDate" value="<?php if(isset($error)){echo $adExpiredDate;}?>"  required />
            </div>
            
            </div>
            
        	<div class="row">
		 <div class="form-group col-sm-6">
			<label>Select Category:</label>
		</div>
		 <div class="form-group col-sm-6">
			<select name="categoryid" class="form-control" required="required">
			<?php
		$stmt = $DB_con->prepare("SELECT * FROM category ");
		$stmt->execute();
		print "<option value=''>Select</option>";
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			print "<option value='".$row['categoryId']."'>".$row['categoryName']."</option>";
		}
			?>
			</select>
		</div>
	</div>
	
	          <div class="form-group col-sm-6">
            <input type="file" name="adPicture"  value="<?php if(isset($error)){echo $adTitle;}?>" required />
            </div>
            

            <div class="clearfix"></div>
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-success" name="btn-adad">Submit</button>
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