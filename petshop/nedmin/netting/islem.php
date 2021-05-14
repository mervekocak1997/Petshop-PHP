<?php
ob_start();
session_start(); 

include 'baglan.php';

if(isset($_POST['genelayarkaydet'])) {


	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_title=:ayar_title,
		ayar_logo=:ayar_logo,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_title' => $_POST['ayar_title'],
		'ayar_logo' => $_POST['ayar_logo'],
		'ayar_description' => $_POST['ayar_description'],
		'ayar_keywords' => $_POST['ayar_keywords'],
		'ayar_author' => $_POST['ayar_author']
	));

	
	if ($update) {

		header("Location:../production/genel-ayar.php?durum=ok");

	} else {

		header("Location:../production/genel-ayar.php?durum=no");
	}


}


if(isset($_POST['iletisimayarkaydet'])) {


	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_tel=:ayar_tel,
		ayar_gsm=:ayar_gsm,
		ayar_mail=:ayar_mail,
		ayar_ilce=:ayar_ilce,
		ayar_il=:ayar_il,
		ayar_adres=:ayar_adres
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_tel' => $_POST['ayar_tel'],
		'ayar_gsm' => $_POST['ayar_gsm'],
		'ayar_mail' => $_POST['ayar_mail'],
		'ayar_ilce' => $_POST['ayar_ilce'],
		'ayar_il' => $_POST['ayar_il'],
		'ayar_adres' => $_POST['ayar_adres']
	));

	
	if ($update) {

		header("Location:../production/iletisim-ayar.php?durum=ok");

	} else {

		header("Location:../production/iletisim-ayar.php?durum=no");
	}


}

if(isset($_POST['hakkimizdakaydet'])) {


	$hakkimizdakaydet=$db->prepare("UPDATE hakkimizda SET
		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_icerik=:hakkimizda_icerik
		WHERE hakkimizda_id=0");

	$update=$hakkimizdakaydet->execute(array(
		'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
		'hakkimizda_icerik' => $_POST['hakkimizda_icerik']
	));

	
	if ($update) {

		header("Location:../production/hakkimizda.php?durum=ok");

	} else {

		header("Location:../production/hakkimizda.php?durum=no");
	}


}

if(isset($_POST['uyekaydet'])) {

	$uyekaydet=$db->prepare("INSERT into kullanici set
		kullanici_ad=:kullanici_ad,
		kullanici_soyad=:kullanici_soyad,
		kullanici_mail=:kullanici_mail,
		kullanici_sifre=:kullanici_sifre,
		kullanici_tel=:kullanici_tel

		");

	$insert=$uyekaydet->execute(array(
		'kullanici_ad' => ucwords($_POST['kullanici_ad']),
		'kullanici_soyad' => ucwords($_POST['kullanici_soyad']),
		'kullanici_mail' => $_POST['kullanici_mail'],
		'kullanici_sifre' => $_POST['kullanici_sifre'],
		'kullanici_tel' => $_POST['kullanici_tel']



	));

	
	if ($insert) {

		header("Location:..\..\uyelik.php?durum=oke");
		exit;

	} else {

		header("Location:..\..\uyelik.php?durum=noe");
		exit;
	}


}
if(isset($_POST['istekkaydet'])) {


	$uyekaydet=$db->prepare("INSERT into istek set
		istek_ad=:istek_ad,
		istek_mail=:istek_mail,
		istek_icerik=:istek_icerik

		");

	$insert=$uyekaydet->execute(array(
		'istek_ad' => $_POST['istek_ad'],
		'istek_mail' => $_POST['istek_mail'],
		'istek_icerik' => $_POST['istek_icerik']



	));

	
	if ($insert) {

		header("Location:..\..\index.php?durum=ok");
		exit;

	} else {

		header("Location:..\..\index.php?durum=no");
		exit;
	}


}
if(isset($_POST['mailkaydet'])) {


	$uyekaydet=$db->prepare("INSERT into mail set
		mail_ad=:mail_ad,
		mail_mail=:mail_mail,
		mail_icerik=:mail_icerik

		");

	$insert=$uyekaydet->execute(array(
		'mail_ad' => $_POST['mail_ad'],
		'mail_mail' => $_POST['mail_mail'],
		'mail_icerik' => $_POST['mail_icerik']



	));

	
	if ($insert) {

		header("Location:..\..\index.php?durum=ok");
		exit;

	} else {

		header("Location:..\..\index.php?durum=no");
		exit;
	}


}


if (isset($_POST['admingiris'])) {

	$kullanici_mail=$_POST['kullanici_mail'];
	$kullanici_sifre=($_POST['kullanici_sifre']);


	$uyesor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_sifre=:sifre and kullanici_yetki=:yetki" );
	$uyesor->execute(array(
		'mail' => $kullanici_mail,
		'sifre' => $kullanici_sifre,
		'yetki' => 5
	));

	echo $say=$uyesor->rowCount();

	if ($say==1){

		echo $_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../production/index.php");
		
	}	else {

		header("Location:../production/login.php?durum=no");
	}





}
if (isset($_POST['uyegiris'])) {

	$kullanici_mail=$_POST['kullanici_mail'];
	$kullanici_sifre=$_POST['kullanici_sifre'];


	$uyesor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_sifre=:sifre " );
	$uyesor->execute(array(
		'mail' => $kullanici_mail,
		'sifre' => $kullanici_sifre
	));

	echo $say=$uyesor->rowCount();

	if ($say==1){

		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../../index.php");
		exit;
	}	else {

		header("Location:../../index.php?durum=no");
		
	}
}

if(isset($_POST['uyeduzenle'])) {

	$kullanici_id=$_POST['kullanici_id'];


	$uyekaydet=$db->prepare("UPDATE kullanici SET
		kullanici_ad=:kullanici_ad,
		kullanici_soyad=:kullanici_soyad,
		kullanici_mail=:kullanici_mail,
		kullanici_tel=:kullanici_tel,
		kullanici_yetki=:kullanici_yetki
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$uyekaydet->execute(array(
		'kullanici_ad' => $_POST['kullanici_ad'],
		'kullanici_soyad' => $_POST['kullanici_soyad'],
		'kullanici_mail' => $_POST['kullanici_mail'],
		'kullanici_tel' => $_POST['kullanici_tel'],
		'kullanici_yetki' => $_POST['kullanici_yetki']
	));

	
	if ($update) {

		header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");

	} else {

		header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
	}


}


if ($_GET['kullanicisil']=="ok") {

	$sil=$db->prepare("DELETE from kullanici where kullanici_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['kullanici_id']
	));


	if ($kontrol) {


		header("location:../production/kullanici.php?sil=ok");


	} else {

		header("location:../production/kullanici.php?sil=no");

	}


}


if(isset($_POST['hesapduzenle'])) {

	$kullanici_id=$_POST['kullanici_id'];


	$uyekaydet=$db->prepare("UPDATE kullanici SET
		kullanici_ad=:kullanici_ad,
		kullanici_soyad=:kullanici_soyad,
		kullanici_mail=:kullanici_mail,
		kullanici_tel=:kullanici_tel
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$uyekaydet->execute(array(
		'kullanici_ad' => $_POST['kullanici_ad'],
		'kullanici_soyad' => $_POST['kullanici_soyad'],
		'kullanici_mail' => $_POST['kullanici_mail'],
		'kullanici_tel' => $_POST['kullanici_tel']
	));

	
	if ($update) {

		header("Location:../../hesabim.php?kullanici_id=$kullanici_id&durum=ok");

	} else {

		header("Location:../../hesabim.php?kullanici_id=$kullanici_id&durum=no");
	}


}
if(isset($_POST['hayvanduzenle'])) {

	$hayvan_id=$_POST['hayvan_id'];


	$hayvankaydet=$db->prepare("UPDATE hayvan SET
		hayvan_baslik=:hayvan_baslik,
		hayvan_icerik=:hayvan_icerik,
		hayvan_foto=:hayvan_foto
		WHERE hayvan_id={$_POST['hayvan_id']}");

	$update=$hayvankaydet->execute(array(
		'hayvan_baslik' => $_POST['hayvan_baslik'],
		'hayvan_icerik' => $_POST['hayvan_icerik'],
		'hayvan_foto' => $_POST['hayvan_foto']
	));

	
	if ($update) {

		header("Location:../production/hayvan.php?hayvan_id=$hayvan_id&durum=ok");

	} else {

		header("Location:../../hayvan.php?hayvan_id=$hayvan_id&durum=no");
	}


}
if ($_GET['hayvansil']=="ok") {
	
	$sil=$db->prepare("DELETE from hayvan where hayvan_id=:hayvan_id");
	$kontrol=$sil->execute(array(
		'hayvan_id' => $_GET['hayvan_id']
	));

	if ($kontrol) {

		Header("Location:../production/hayvan.php?durum=ok");

	} else {

		Header("Location:../production/hayvan.php?durum=no");
	}

}
if (isset($_POST['hayvanekle'])) {

	$kaydet=$db->prepare("INSERT INTO hayvan SET
		hayvan_baslik=:hayvan_baslik,
		hayvan_icerik=:hayvan_icerik,
		hayvan_foto=:hayvan_foto	
		");
	$insert=$kaydet->execute(array(
		'hayvan_baslik' => $_POST['hayvan_baslik'],
		'hayvan_icerik' => $_POST['hayvan_icerik'],
		'hayvan_foto' => $_POST['hayvan_foto']
	));

	if ($insert) {

		Header("Location:../production/hayvan.php?durum=ok");

	} else {

		Header("Location:../production/hayvan.php?durum=no");
	}

}
if(isset($_POST['urunduzenle'])) {

	$urun_id=$_POST['urun_id'];


	$urunkaydet=$db->prepare("UPDATE urun SET
		urun_baslik=:urun_baslik,
		urun_icerik=:urun_icerik,
		urun_foto=:urun_foto,
		urun_fiyat=:urun_fiyat
		WHERE urun_id={$_POST['urun_id']}");

	$update=$urunkaydet->execute(array(
		'urun_baslik' => $_POST['urun_baslik'],
		'urun_icerik' => $_POST['urun_icerik'],
		'urun_foto' => $_POST['urun_foto'],
		'urun_fiyat' => $_POST['urun_fiyat']
	));

	
	if ($update) {

		header("Location:../production/urun.php?urun_id=$urun_id&durum=ok");

	} else {

		header("Location:../../urun.php?urun_id=$urun_id&durum=no");
	}


}
if ($_GET['urunsil']=="ok") {
	
	$sil=$db->prepare("DELETE from urun where urun_id=:urun_id");
	$kontrol=$sil->execute(array(
		'urun_id' => $_GET['urun_id']
	));

	if ($kontrol) {

		Header("Location:../production/urun.php?durum=ok");

	} else {

		Header("Location:../production/urun.php?durum=no");
	}

}
if (isset($_POST['urunekle'])) {

	$kaydet=$db->prepare("INSERT INTO urun SET
		urun_baslik=:urun_baslik,
		urun_icerik=:urun_icerik,
		urun_foto=:urun_foto,
		urun_fiyat=:urun_fiyat	
		");
	$insert=$kaydet->execute(array(
		'urun_baslik' => $_POST['urun_baslik'],
		'urun_icerik' => $_POST['urun_icerik'],
		'urun_foto' => $_POST['urun_foto'],
		'urun_fiyat' => $_POST['urun_fiyat']
	));

	if ($insert) {

		Header("Location:../production/urun.php?durum=ok");

	} else {

		Header("Location:../production/urun.php?durum=no");
	}

}
?>
