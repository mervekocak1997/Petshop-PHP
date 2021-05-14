<?php include 'header.php'; ?>
<br><br>
<div class="container">

	<form action="nedmin\netting\islem.php" method="POST" class="form-horizontal checkout"  >
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg ">
					<div class="card bg-info title">Üye Bilgileri
						<?php 

						if ($_GET['durum']=="oke") {?>

							<b style="color:green;">İşlem Başarılı...</b>

						<?php } elseif ($_GET['durum']=="noe") {?>

							<b style="color:red;">İşlem Başarısız...</b>

						<?php }

						?></div>
					</div>
					<br>
					<form action="nedmin\netting\islem.php" method="POST">
					<div class="form-group col-md-12">
						<div class="col-sm-6">
							<input type="text" required="" class="form-control" name="kullanici_ad"  placeholder="Adı">
						</div>
						<br>
						<div class="col-sm-6">
							<input type="text" required="" class="form-control" name="kullanici_soyad"  placeholder="Soyad">
						</div>
						<br>
						<div class="col-sm-6">
							<input type="email" required="" class="form-control" name="kullanici_mail"  placeholder="Email">
						</div>
						<br>
						<div class="col-sm-6">
							<input type="text" required="" class="form-control" name="kullanici_tel" placeholder="Telefon">
						</div>
						<br>
						<div class="col-sm-6">
							<input type="password" required="" class="form-control" name="kullanici_sifre" placeholder="Şifre">
						</div>
						<button type="submit" name="uyekaydet" class="button">Kayıt Ol</button>
					</div>
					</form>
				</div>
				<div class="col-md-6">
					<div class="title-bg ">
						<div class="card bg-info title">Üye Bilgileri
							<?php 

							if ($_GET['durum']=="ok") {?>

								<b style="color:green;">İşlem Başarılı...</b>

							<?php } elseif ($_GET['durum']=="no") {?>

								<b style="color:red;">İşlem Başarısız...</b>

							<?php }

							?></div>
						</div>
						<br>
						<div class="form-group col-md-12">
							<form action="nedmin\netting\islem.php" method="POST" role="form">
							<div class="form-group">
												<input type="email" name="kullanici_mail" class="form-control" id="mail" placeholder="Email">
											</div>
											<div class="form-group">
												<input type="password" name="kullanici_sifre" class="form-control" id="sifre" placeholder="Şifre">
											</div>
											<div class="form-group">
												<button name="uyegiris" class="button">Giriş Yap</button>
							</div>
						</form>

					</div>
				</div>
			</form>
		</div>
	</div>


	<?php include 'footer.php'; ?>