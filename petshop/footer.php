
       <footer>
        <nav class="navbar navbar-expand-lg navbar-dark bg-warning fixed-bottom">
    <div class="container">
      
      <a href="index.php" class="navbar-brand text-dark"><strong>İstekleriniz</strong></a> 
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#altmenuac" >
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="altmenuac">
        <form action="nedmin\netting\islem.php" method="POST" class="form-inline checkout">
          <input type="text" class="form-control col-auto mr-2" name="mail_ad" placeholder="Ad ve Soyad..." name="">
          <input type="email" class="form-control col-auto " name="mail_mail" placeholder="Mail Adresi..." name="">
          <input type="text" class="form-control col-auto " name="mail_icerik" placeholder="İsteğiniz..." name="">
          
          <button type="submit" name="mailkaydet" class="btn btn-warning ml-2">Gönder!</button>
        </form>

      </div>

    </div>

    </nav>
  </footer>




     </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>