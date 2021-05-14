<?php 
ob_start();
session_start(); 
include '../netting/baglan.php';

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

if ($say==0) {
  header("Location:login.php?durum=izinsiz");
  exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Admin Paneli</title>

  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">


          <div class="clearfix"></div>

          <!-- menu profili -->
          <div class="profile clearfix">

            <div class="profile_info">
              <span>Hoşgeldin,  <h2><?php echo $uyecek['kullanici_ad'] ?> <?php echo $uyecek['kullanici_soyad'] ?></h2></span>
              
            </div>
          </div>
          <!-- menü profili bitiş -->

          <br />

          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Menüler</h3>
              <ul class="nav side-menu">
                <li><a href="index.php"><i class="fa fa-laptop"></i> Anasayfa</a></li>
                <li><a><i class="fa fa-cogs"></i> Ayarlar <i class="fa fa-chevron-down"></i></a>
                  <ul class="nav child_menu">
                    <li><a href="genel-ayar.php">Genel Ayarlar</a></li>
                    <li><a href="iletisim-ayar.php">İletişim Ayarlar</a></li>
                  </ul>
                </li>
                <li><a href="kullanici.php"><i class="fa fa-users"></i>Kullanıcılar</a></li>
                <li><a href="hayvan.php"><i class="fas fa-cat"></i>   Hayvanlar</a></li>

                <li><a href="urun.php"><i class="fas fa-shopping-basket"></i>   Ürünler</a></li>
                <li><a href="istekler.php"><i class="fa fa-users"></i>   İstekler</a></li>
              </ul>
            </div>
            

          </div>

          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
        </div>
      </div>

      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <?php echo $uyecek['kullanici_ad'] ?> <?php echo $uyecek['kullanici_soyad'] ?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">


                  <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Çıkış Yap!</a></li>
                </ul>
              </li>

              

            </ul>
          </nav>
        </div>
      </div>