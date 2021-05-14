<?php 
include 'header.php'; 
$hayvansor=$db->prepare("SELECT * FROM hayvan order by hayvan_id  DESC");
$hayvansor->execute();


?>

<div class="container">
 <div class="row mt-4">
   <div class="col-md-8">
    <h1>Makaleler</h1>

    <hr class="bg-warning">
    <div class="card mb-4">
      <?php 
      $say=0;

      while($hayvancek=$hayvansor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>
        <img class="images card-img-top" src="images/<?php echo $hayvancek['hayvan_foto'] ?>.jpg">
        <div class="card-body">
         <h2 class="card-title"><?php echo $hayvancek['hayvan_baslik'] ?></h2>
         <P class="card-text"><?php echo $hayvancek['hayvan_icerik'] ?></P>
       </div>
       <div class="card-footer text-muted">
         <span>Yayınlandığı Tarih <?php echo $hayvancek['hayvan_zaman'] ?></span>
       </div>
       <br><br>
     <?php  }

     ?>
   </div>

 </div>



 <div class="col-md-4">

   <div class="card my-4">
    <h5 class="card-header bg-warning text-dark">Kateregoriler</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <ul>
            <li>
              <a href="index.php" class="text-dark">Anasayfa</a>
            </li>
            <li>
              <a href="urunler.php" class="text-dark">Ürünlerimiz</a>
            </li>
            <li>
              <a href="iletisim.php" class="text-dark">İletişim</a>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </div> 

  <div class="card my-4">
    <h6 class="card-header bg-warning text-dark">Reklam Alanı</h6>
    <div align="center" class="card-body">
      <img class="img-fluid" src="images/selcuk.jpg">
    </div>
  </div> 
         </div>
       </div>

  <?php include 'footer.php'; ?>

