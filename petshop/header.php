<?php 
ob_start();
session_start(); 
include 'nedmin/netting/baglan.php';
$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
	'id'=> 0
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

$uyesor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
$uyesor->execute(array(
	'mail'=> $_SESSION['kullanici_mail']
));
$say=$uyesor->rowCount();
$uyecek=$uyesor->fetch(PDO::FETCH_ASSOC);

$hayvansor=$db->prepare("SELECT * FROM hayvan where hayvan_id=:id");
$hayvansor->execute(array(
	'id' => $_GET['hayvan_id']
));

$hayvancek=$hayvansor->fetch(PDO::FETCH_ASSOC);

$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:id");
$urunsor->execute(array(
	'id' => $_GET['urun_id']
));

$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- Üst başlık -->
	<title><?php echo $ayarcek['ayar_title'] ?></title>
	<!-- Siteyi ön plana çıkaran kelimeler  -->
	<meta name="description" content="<?php echo $ayarcek['ayar_description'] ?>">
	<meta name="keywords" content="<?php echo $ayarcek['ayar_keywords'] ?>">
	<meta name="author" content="<?php echo $ayarcek['ayar_author'] ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/lib/bootstrap.min.css">
	<script src="/lib/jquery-1.12.2.min.js"></script>
	<script src="/lib/bootstrap.min.js"></script>
</head>
<body background="success">

	<br>
	<!-- Üst kısım navbar  -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-warning ">
		<div class="container col-md-6">

			<a href="index.php" class="navbar-brand"><img width="60" src="nedmin\production\images\<?php echo $ayarcek['ayar_logo'] ?>.jpg"></a> 

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuac" >
				<span class="navbar-toggler-icon"></span>
			</button>



			<div class="collapse navbar-collapse" id="menuac">
				<ul class="navbar-nav">
					<li class="nav-item active" >
						<a href="index.php" class="nav-link text-dark"><i class="fas fa-home fa-2x "></i></a>  
					</li>


					<li class="nav-item media ml-4 ">
						<a href="urunler.php" class="nav-link text-dark "><strong>Hayvanlar<i class="fas fa-angle-down"></i></strong></a>  
					</li>

					<li class="nav-item ">
						<a href="iletisim.php" class="nav-link text-dark "><strong>İletişim<i class="fas fa-angle-down"></i></strong></a>  
					</li>
				</ul>
				<?php 
				if ($say==1) {
					include 'girisvar.php';
				}
				elseif ($say==0) {
					include 'girisyok.php';
				}


				?>
				


			</div>

		</div>

	</nav>
