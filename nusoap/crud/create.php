<?php
$message = ""; // initial message 
if( isset($_POST['submit_data']) ){

	// Includs client to get $client object
	include 'lib/client.php';

	// Gets the data from post
	$kode_obat = $_POST['kode_obat'];
	$nama_obat = $_POST['nama_obat'];
	$harga_beli = $_POST['harga_beli'];
	$harga_jual = $_POST['harga_jual'];

	/**
	* Calling the "insert" method by "__soapCall" from SOAP SERVER 
	* $client: object of SOAP CLIENT
	* @params: $name, $email, $address
	*/
	if( $client->__soapCall("insert", array($kode_obat, $nama_obat, $harga_beli, $harga_jual)) ){
		$message = "Data is inserted successfully.";
	}else{
		$message = "Sorry, Data is not inserted.";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Data</title>
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">

		<!-- showing the message here-->
		<div><?php echo $message;?></div>

		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="create.php" method="post">
			<tr>
				<td>Kode Obat:</td>
				<td><input name="kode_obat" type="text"></td>
			</tr>
			<tr>
				<td>Nama Obat:</td>
				<td><input name="nama_obat" type="text"></td>
			</tr>
			<tr>
				<td>Harga Beli:</td>
				<td><input name="harga_beli" type="text"></td>
			</tr>
			<tr>
				<td>Harga Jual:</td>
				<td><input name="harga_jual" type="text"></td>
			</tr>
			<tr>
				<td><a href="index.php">See Data</a></td>
				<td><input name="submit_data" type="submit" value="Insert Data"></td>
			</tr>
			</form>
		</table>
	</div>
</body>
</html>