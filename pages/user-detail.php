<?php
$ROOT_DIR="../";
include $ROOT_DIR . "templates/header.php";

$Id = $_GET["Id"];
$user = user()->get("Id=$Id");

?>

<div class="card mb-3">
  <div class="card-header">
    <b>Profile</b>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col">
        <b>Username:</b> <?=$user->username;?>
        <hr>
          <b>First Name:</b> <?=$user->firstName;?>
          <hr>
            <b>Last Name:</b> <?=$user->lastName;?>
            <hr>
              <b>Status:</b> <?=$user->status;?>
              <hr>

      </div>
      <div class="col">
        <b>Role:</b> <?=$user->role;?>
        <hr>
          <b>Contact #:</b> <?=$user->phone;?>
          <hr>
            <b>Email:</b> <?=$user->email;?>
            <hr>
              <b>Date Added:</b> <?=$user->dateAdded;?>
              <hr>

      </div>

    </div>

  </div>

</div>

<?php if ($user->role=="Customer"): ?>

  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col">
          <h3>Cart</h3>
          <ul class="list-group">
          <?php foreach ($cart_list as $cart):
            $item = item()->get("Id=$cart->itemId");
            ?>
            <li class="list-group-item"><b><?=$item->name;?></b> (<?=$cart->quantity;?>)</li>
          <?php endforeach; ?>
        </ul>
        </div>
        <div class="col">
          <h3>Reservation</h3>
          <ul class="list-group">
          <?php foreach ($reservation_list as $res):
            $item = item()->get("Id=$res->itemId");
            ?>
            <li class="list-group-item"><b><?=$item->name;?></b> (<?=$res->quantity;?>)</li>
          <?php endforeach; ?>
        </ul>
        </div>
      </div>

    </div>

  </div>


  <div class="card mt-3">
    <div class="card-body">


<h4>Orders</h4>
<hr>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link <?=$pendingActive?>" href="?status=Pending&Id=<?=$Id?>">Pending</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?=$shippingActive?>" href="?status=Shipping&Id=<?=$Id?>">Shipping</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?=$deliveredActive?>" href="?status=Delivered&Id=<?=$Id?>">Delivered</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?=$canceledActive?>" href="?status=Canceled&Id=<?=$Id?>">Canceled</a>
  </li>
</ul>


<table class="table">
  <tr>
    <th>#</th>
    <th>Order #</th>
    <th>Ordered By</th>
    <th>Ordered Date</th>
    <th>Status</th>
    <th>Method</th>
    <th>Action</th>
  </tr>

<?php
$count = 0;
foreach ($order_list as $row):
  $cust = user()->get("Id=$row->userId");
$count += 1;
   ?>
  <tr>
    <td><?=$count;?></td>
    <td><?=$row->orderNumber;?></td>
    <td><?=$cust->firstName;?> <?=$cust->lastName;?></td>
    <td><?=$row->dateAdded;?></td>
    <td><?=$row->status;?></td>
    <td><?=$row->method;?></td>
    <td><a href="order-detail.php?Id=<?=$row->Id;?>" class="btn btn-primary btn-sm">View</a></td>
    </td>
  </tr>

<?php endforeach; ?>



</table>


</div>
</div>

<?php endif; ?>


<?php include $ROOT_DIR . "templates/footer.php"; ?>
