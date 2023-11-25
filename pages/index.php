<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";

?>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
<br>

<h2>Pulmonary Clinic Management System of MAB</h2>

<script type="text/javascript">
var doc = new jsPDF();
doc.text("Hello world!", 20, 20);
doc.text("This is client-side Javascript, pumping out a PDF.", 20, 30);

</script>

<?php include $ROOT_DIR . "templates/footer.php"; ?>
