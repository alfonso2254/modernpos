<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "modernpos"; /* Database name */

$db = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Total forma de pago</title>

		<style type="text/css">
			body{
    background-image: url(https://images.unsplash.com/photo-1531415074968-036ba1b575da?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=472642856008b6ddb3e596e45ca4263d&auto=format&fit=crop&w=1494&q=80);   
    background-size:1500px 800px;
}


table{
    border:1px solid black;
    border-collapse:collapse ;
	padding:0px;
}

th{
    padding:10px;
    border:1px solid black;

	
}

td{
    padding:10px;
     border:1px solid black;
	text-align:left;
}

tr:nth-child(even)
{
      background-color:white;
}

tr:nth-child(odd)
{
      background-color:#eee;
}
		</style>


	   <!-- Bootstrap CSS -->
    <link type="text/css" href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- jQuery JS -->
    <script src="assets/jquery/jquery.min.js" type="text/javascript"></script>
 <!-- Bootstrap JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>

	<div align="center">
<caption><h2><ins><i>Total de todos los metodos de pago</i></ins></h2></caption>
</div>

<table style="width:65%;height:90%;" align="center">

<tr>
<th colspan="4" style="background-color:#5E1D55;color:white;"><h3>TEST RAKINGS</h3></th>
</tr>

<tr style="background-color:#32A9EE;color:white;">
<th>Id</th>
<th>Metodo de pago</th>
<th>fecha</th>
<th>Total</th>
</tr>


<?php 
$result = $db->query("SELECT name as metodo, SUM(amount) as total FROM `payments` as o JOIN pmethods as m ON o.pmethod_id=m.pmethod_id WHERE 1 GROUP by name");


 ?>
<?php while($row = $result->fetch_assoc()){ ?>
<tr>
<td><b>1</b></td>
<td><?php echo $row['metodo']; ?></td>
<td>27/12/2020</td>
<td><?php
$total = $row['total'];


 echo number_format($total) . " Bs" ; ?></td>
</tr>
<?php } ?>
</body>
</html>