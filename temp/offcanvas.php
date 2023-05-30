<?php 
    $fname = $_SESSION["fname"] ?? "Guest";
    $lname = $_SESSION["lname"] ?? "Guest";
    $email = $_SESSION["email"] ?? "Guest";
    
?>

<div class="offcanvas offcanvas-start text-bg-light" id="demo">
  <div class="offcanvas-header">
    <h1 class="offcanvas-title"><?php echo $fname . " " . $lname ?></h1><br>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
  </div>
    <br><span class="email"><?php echo $email?></span><hr>
  <div class="offcanvas-body">
    <div class="bal">
      <p>Wallet Balance</p>
      <p>$1.00(100 SPD)</p>
    </div>
    <p onclick="connect()">Connect Wallet</p>
    <p>Edit User Profile</p>
    <p><a href="">History</a></p>
    <p>Contact Us</p>
    <p><a href="">Withdraw Earnings</a></p><hr>
    <a href="logout.php" class="btn btn-danger">Log Out</a>
  </div>
</div>
