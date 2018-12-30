<?php
class Db {

	// Host and Database information
	private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $db   = "obat";
	private $mysqli;

	public function __construct(){
		
		// Database Connection
		$this->mysqli = new Mysqli($this->host, $this->user, $this->pass, $this->db);
		
		// Checking the connection is okay or not
		if ($this->mysqli->connect_error) {
		    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
		}
	}

	/**
	* Closing the DB connection
	* @params null
	* @return void 
	*/
	public function __destruct(){
		$this->mysqli->close();
	}

	/**
	* Data insertion in student table
	* @params $name, $email, $address
	* @return (int) insert_id
	*/
	public function insert($kode_obat, $nama_obat, $harga_beli, $harga_jual){
		$this->mysqli->query("INSERT INTO is_obat (kode_obat, nama_obat, harga_beli, harga_jual) VALUES ('$kode_obat', '$nama_obat', '$harga_beli', '$harga_jual')");
		return $this->mysqli->insert_id;
	}

	/**
	* Data updating in student table
	* @params $id, $name, $email, $address
	* @return (boolean) 
	*/
	public function update($id, $nama_obat, $harga_beli, $harga_jual, $kode_obat){
		return $this->mysqli->query("UPDATE is_obat SET kode_obat='$kode_obat', nama_obat='$nama_obat', harga_beli='$harga_beli', harga_jual='$harga_jual' WHERE id=$id");
	}

	/**
	* Data deletion from student table
	* @params $id
	* @return (boolean) 
	*/
	public function delete($id){
		return $this->mysqli->query("DELETE FROM is_obat WHERE id=$id");
	}

	/**
	* Data retriving from student table
	* @params $condition (optional)
	* @return (array) mixed
	*/
	public function getAll(){
		$result = $this->mysqli->query("SELECT * FROM is_obat");
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	/**
	* Row data retriving from student table according to $id
	* @params $id
	* @return (array) mixed
	*/
	public function getById($id){
		return $this->mysqli->query("SELECT * FROM is_obat WHERE id=$id")->fetch_assoc();
	}
}

?>