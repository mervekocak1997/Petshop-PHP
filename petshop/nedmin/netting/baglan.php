<?php 

try {

	$db=new PDO("mysql:host=localhost;dbname=petshop;charset=utf8",'root','12345678');
	
	//echo "Veritabanı bağlantısı başarılı";

} catch (PDOExpception $e) {

	echo $e->getMessage();
}


?>

