<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$hayvansor=$db->prepare("SELECT * FROM hayvan order by hayvan_id  DESC");
$hayvansor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Hayvan Listeleme <small>,

              <?php 

              if ($_GET['durum']=="ok") {?>

                <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

                <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>

            <div class="clearfix"></div>

            <div align="right">
              <a href="hayvan-ekle.php"><button class="btn btn-success btn-xs"> Yeni Ekle</button></a>

            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Hayvan Başlık</th>
                  <th>Hayvan İçerik</th>
                  <th>Hayvan Fotoğraf</th>


                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($hayvancek=$hayvansor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                  <tr>
                   <td><?php echo $hayvancek['hayvan_baslik'] ?></td>
                   <td><?php echo substr($hayvancek['hayvan_icerik'], 0,50)?>...</td>
                   <td><?php echo $hayvancek['hayvan_foto'] ?></td>

                   <td><center><a href="hayvan-duzenle.php?hayvan_id=<?php echo $hayvancek['hayvan_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                   <td><center><a href="../netting/islem.php?hayvan_id=<?php echo $hayvancek['hayvan_id']; ?>&hayvansil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
                 </tr>



               <?php  }

               ?>


             </tbody>
           </table>

           <!-- Div İçerik Bitişi -->


         </div>
       </div>
     </div>
   </div>




 </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
