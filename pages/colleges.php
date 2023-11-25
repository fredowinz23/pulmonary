


<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$college_list = college()->list();



?>

  <div class="row">
    <div class="col-12 text-left">
      <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary mt-3">Add New College</a>
    </div>
  </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Category Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

              <form action="process.php?action=college-add" enctype="multipart/form-data" method="post">
      <div class="modal-body">

              <div class="col-lg-12">
                <b>Code</b>
                <input type="text"class="form-control" name="code" required>
              </div>

              <div class="col-lg-12">
                <b>Name</b>
                <input type="text"class="form-control" name="name" required>
              </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>

              </form>
    </div>
  </div>
</div>
<br>

<table class="table">
  <tr>
    <th>#</th>
    <th>Code</th>
    <th>Name</th>
    <th width="100">Action</th>
  </tr>

  <?php
  $count = 0;
   foreach ($college_list as $row):
     $count += 1;
     ?>
    <tr>
      <td><?=$count;?></td>
      <td><?=$row->code;?></td>
      <td><?=$row->name;?></td>
      <td><a href="process.php?action=college-delete&Id=<?=$row->Id;?>" class="btn btn-danger btn-sm">Delete</a></td>

    </tr>
  <?php endforeach; ?>

</table>

<?php include $ROOT_DIR . "templates/footer.php"; ?>
