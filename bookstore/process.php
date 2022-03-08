<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
<link rel="stylesheet" href="bootstrap/css/card.css">

</head>
<body>
<?php
	session_start();
	date_default_timezone_set ('Africa/Nairobi');
	$_SESSION['err'] = 1;
	foreach($_POST as $key => $value){
		if(trim($value) == ''){
			$_SESSION['err'] = 0;
		}
		break;
	}

	if($_SESSION['err'] == 0){
		header("Location: purchase.php");
	} else {
		unset($_SESSION['err']);
	}

	require_once "./functions/database_functions.php";
	// print out header here
	$title = "Purchase Process";
	require "./template/header.php";
	// connect database
	$conn = db_connect();
	extract($_SESSION['ship']);
	$card_number = $_GET['phone'];
	$bookprice = $_GET['amount'];
	$account = $_GET['account'];
	$card_owner=$_GET['card_owner'];
	
	// validate post section
	// $card_number = $_POST['card_number'];
	// $card_PID = $_POST['card_type'];
	// $card_expire = strtotime($_POST['card_expire']);
	// $card_owner = $_POST['card_owner'];

	// find customer
	$customerid = getCustomerId($name, $address, $city, $zip_code, $country);
	if($customerid == null) {
		// insert customer into database and return customerid
		$customerid = setCustomerId($name, $address, $city, $zip_code, $country);
	}
	$date = date("Y-m-d H:i:s");
	insertIntoOrder($conn, $customerid, $_SESSION['total_price'], $date, $name, $address, $city, $zip_code, $country);

	// take orderid from order to insert order items
	$orderid = getOrderId($conn, $customerid);

	foreach($_SESSION['cart'] as $isbn => $qty){
		$bookprice = getbookprice($isbn);
		$query = "INSERT INTO order_items VALUES 
		('$orderid', '$isbn', '$bookprice', '$qty')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Insert value false!" . mysqli_error($conn2);
			exit;
		}
	}
	session_unset();

?>

	<p class="lead text-success">Your order has been processed sucessfully. Please check your Phone to enter your pin for payment and Email for shipping detail!. 
	Your cart is empty.</p>
	<div class="container">
  <div class="card__container">
    <center>
    <div class="card">
      <div class="card__content">
        <h3 class="card__header">Your Purchase Details</h3>
        <!-- <p class="card__info">Name: Olala  </p> -->
	
		<table id="customers">
  <tr>
    <th>Full Name</th>
    <th>Contact</th>
    <th>Book</th>
	<th>Amount</th>
  </tr>
 
    <td><?php echo $card_owner ?></td>
    <td><?php echo $card_number; ?></td>
    <td><?php echo $account ?></td>
	<td>Ksh. <?php echo $bookprice ?></td>
  </tr>

</table>
<a href="books.php" class="card__button">Proceed</a>
      </div>
</center>
    </div>
  
  </div>
</div>

</body>
</html>
