<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
  </head>

  <body>
    <header>
      <h1>Expertize</h1>
	  <h1>Payment Details</h1>
    </header>
</body>

<style>

body {
  background-color: rgba(22,34,57,0.99);
}

	header {
  display: flex;
  justify-content: space-between; 
  align-items:center ;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  color: #fff;
  letter-spacing: 0.5px;
  padding: 15px 20px;
  border: 2px solid rgba(250,250,250,0.1);
}

.logo {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-right: 20px;
}

.logo img {
  max-height: 100px;
}

table {
    font-family: Arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
	font-size: 1.5em;
}

td, th {
    padding: 8px;
    color: white; 
}

th {
    background-color: #4CAF50;
    color: white;
}

.message {
    color: white;
	font-size: 2em;
	margin-top: 20px;
	text-align: center;
	background-color: #d9971f;
    border: 2px solid #fff;
    padding: 10px;
	
}

</style>

<?php include('Crypto.php')?>
<?php

	error_reporting(0);
	
	$workingKey='85B65CABD36AE2912246293B81135CF7';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	echo "<center>";

	echo "<br><br>";

	echo "<table>";
for($i = 0; $i < $dataSize; $i++) 
{
    $information=explode('=',$decryptValues[$i]);
    if ($information[0] == 'order_id')
    {
        echo '<tr><td>Order ID</td><td>'.$information[1].'</td></tr>';
    }
    else if ($information[0] == 'amount')
    {
        echo '<tr><td>Paid Amount</td><td>'.$information[1].'</td></tr>';
    }
}
echo "</table>";
	echo "</center>";


	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
	}

	if($order_status==="Success")
	{
		echo "<div class='message'>Thank You for Registring with us. 
		Your Transaction is Successful.</div>";
		
	}
	else if($order_status==="Aborted")
	{
		echo "<div class='message' >Thank you for shopping with us. We will keep you posted regarding the status of your order through e-mail.</div>";
	
	}
	else if($order_status==="Failure")
	{
		echo "<div class='message' >OOPS!! The Payment is Failed Due To Some Reason. Kindly Try Again!!</div>";
	}
	else
	{
		echo "<div class='message' >Security Error. Illegal access detected.</div>";
	
	}
?>
