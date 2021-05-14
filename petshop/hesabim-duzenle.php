<?php 
ob_start();
session_start(); 
include 'header.php'; 

//Belirli veriyi seçme işlemi



$uyesor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
$uyesor->execute(array(
'id'=> $_GET['kullanici_id']
));
$say=$uyesor->rowCount();
$hesapcek=$uyesor->fetch(PDO::FETCH_ASSOC);

?>


<div class="container">

	<div class="row">
		<div class="col-md-9"><!--Main content-->
			<form action="nedmin/netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad<span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="first-name" name="kullanici_ad" value="<?php echo $uyecek['kullanici_ad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Soyad<span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="first-name" name="kullanici_soyad" value="<?php echo $uyecek['kullanici_soyad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail Adresi<span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="first-name" name="kullanici_mail"  value="<?php echo $uyecek['kullanici_mail'] ?>" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefon<span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="first-name" name="kullanici_tel" value="<?php echo $uyecek['kullanici_tel'] ?>" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>


				<input type="hidden" name="kullanici_id" value="<?php echo $uyecek['kullanici_id'] ?>">


				<div class="ln_solid"></div>
				<div class="form-group">
					<div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						<button type="submit" name="hesapduzenle" class="btn btn-success">Güncelle</button>
																       <?php 

              if ($_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>
					</div>
				</div>

			</form>



		</div>




	</div>
</div>
<?php include 'footer.php' ?>