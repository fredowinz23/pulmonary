    </div>
  </div>
</div>
    <div id="copyright">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mb-2 mb-lg-0">
            <p class="text-center text-lg-left">©2023 Pulmonary Clinic Management System of Mob.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- *** COPYRIGHT END ***-->
    <!-- JavaScript files-->
    <script src="<?=$ROOT_DIR;?>templates/plugins/jquery.min.js"></script>
    <script src="<?=$ROOT_DIR;?>templates/plugins/bootstrap.bundle.min.js"></script>
    <script src="<?=$ROOT_DIR;?>templates/plugins/jquery.cookie.js"> </script>
    <script src="<?=$ROOT_DIR;?>templates/plugins/owl.carousel.min.js"></script>
    <script src="<?=$ROOT_DIR;?>templates/plugins/owl.carousel2.thumbs.js"></script>
    <script src="<?=$ROOT_DIR;?>templates/js/front.js"></script>
  </body>
</html>


<script type="text/javascript">
$(function () {

  <?php if ($success): ?>
    Swal.fire({
      title: "Good job!",
      text: "<?=$success?>",
      icon: "success"
    });
  <?php endif; ?>


  <?php if ($error): ?>
    Swal.fire({
      title: "Error!",
      text: "<?=$error?>",
      icon: "error"
    });
  <?php endif; ?>


  });

</script>
