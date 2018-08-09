<?php
	 function insert($tablename,$tableField,$dataField){
		try{
			$con=new PDO("mysql:host=localhost;dbname=first","root","");
		}
		catch(PDOException $e){
			die("connection is faild".$e->getmessage());
		}
	 	$column=implode(",", $tableField);
	 	$data="'".implode("','", $dataField)."'";
		$q="INSERT INTO $tablename ($column) VALUES ($data) ";
		$a=$con->query($q);
		if($a){
			echo "data inserted";
		}
		else{
			echo "data not be inserted";
		}
		
	} 
	function select($tablename,$choice,$value){
		try{
			$con=new PDO("mysql:host=localhost;dbname=first","root","");
		}
		catch(PDOException $e){
			die("connection is faild".$e->getmessage());
		}
		$q="SELECT * from $tablename WHERE $choice='$value' ";
		$r=$con->query($q);
		foreach($r as $k){
			return $k;
		}
	}
	function selectAll($tablename){
		try{
			$con=new PDO("mysql:host=localhost;dbname=first","root","");
		}
		catch(PDOException $e){
			die("connection is faild".$e->getmessage());
		}
		$q="SELECT * from $tablename ";
		$r=$con->query($q);
		return $r;
	}
	function delete($tablename,$choice,$value){
		try{
			$con=new PDO("mysql:host=localhost;dbname=first","root","");
		}
		catch(PDOException $e){
			die("connection is faild".$e->getmessage());
		}
		$q="DELETE from $tablename WHERE $choice='$value' ";
		$row=select($tablename,$choice,$value);
		if($row){
			$r=$con->query($q);
			if($r){
				echo "data is deleted";
			}
		}
		else{
			echo "data not be exist";
		}	
	}
	function deleteAll($tablename){
		try{
			$con=new PDO("mysql:host=localhost;dbname=first","root","");
		}
		catch(PDOException $e){
			die("connection is faild".$e->getmessage());
		}
		$q="DELETE from $tablename ";
		$r=$con->query($q);
		if ($r) {
			echo "all data  is deleted";
		}
	}
	
?>