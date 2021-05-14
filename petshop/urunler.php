<?php include 'header.php';
$urunsor=$db->prepare("SELECT * FROM urun order by urun_id  DESC");
$urunsor->execute();
 
 ?>
<br>
<div class="container">
	<div class="row">
		<div class="baslik"><h1>Ürünler</h1></div>
	<br><br><br><br>
		<?php 
                $say=0;

                while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>

		
				<div  class="media ">
	
			<img width="250" height="150" class="d-flex mr-4 align-self-end col-md-3" src="images/<?php echo $uruncek['urun_foto'] ?>.jpg">

			<div class="media-body col-md-9 ">
				<br>
				<h5 class="mt-0"><?php echo $uruncek['urun_baslik'] ?></h5>
				<p><?php echo $uruncek['urun_icerik'] ?></p>
<div class="col-mt-2">
		<div class="fiyat col-md-2 " align="center"> <strong><?php echo $uruncek['urun_fiyat'] ?> ₺</strong></div><a href=""><div class="button col-md-2">Satın Al</div></a>
			
			</div>
			</div>
		</div>
		<br><br>

<?php } ?>




		<br><br><br><br>






</div>
<?php include 'footer.php'; ?>