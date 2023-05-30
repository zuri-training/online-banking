<?php 
    session_start();

    if(!$_SESSION){
        header("location: login.php");
    }

    $name = $_SESSION["fname"] ?? "Guest";
    include("./temp/header.php");
    include("./temp/connection.php");
    include("./temp/offcanvas.php");

    // // Get current logged in User info
    // $sql = "SELECT * FROM userstable WHERE firstname = '$name'";
    // $res = mysqli_query($connection,$sql);
    // $fetch = mysqli_fetch_assoc($res);
    // print_r($fetch);
    
?>

<div class="main-page">

    <nav>

       <div class="left">
        <h2>SPD Miner</h2>
            <ul>
                <li><a href="" data-bs-toggle="offcanvas" data-bs-target="#demo">Wallet</a></li>
                <li><a href="" class="profile" data-bs-toggle="offcanvas" data-bs-target="#demo">Profile</a></li>
            </ul>
       </div>

       <div class="right">
        <h4><?php echo $name ?></h4>
        <?php if($_SESSION):?>
            <p>Balance : $1.00(100 SPD)</p>
        <?php else:?>
            <a href="login.php" class="btn btn-primary">Log In </a>
        <?php endif?>
       </div>

    </nav>


    <main>

        <div class="section1 text-center">
            <h2>SPD miner is the easiest way to earn cryptocurrency</h2>
            <p>While you remain on this page you will earn</p>
        </div>

        <div class="section2 row">
            <div class="small-box col-sm-3">
                <h4>Mined lifetime :</h4>
                <span>0.0000000 SPD</span>
                <p>Approximately : $0.00000</p>
            </div>

            <div class="big-box col-sm-8">
                <div class="bal">
                    <h4>Your Balance</h4>
                </div>

                <div class="info-grp">
                    <div class="mine-btns">
                        <button class="btn btn-primary">Start Mining</button><br>
                        <button class="btn btn-outline-primary">Withdraw</button>
                    </div>

                    <div class="amount">
                        <h4>0.000000003728 SPD</h4>
                        <span>Approximately : $0.00000</span>
                        <p>Minimal withdrawal amount (1000 SPD)</p>
                    </div>
                </div>

                <div class="speed">
                    <button class="btn btn-primary" onclick="connect()">Connect Wallet (MetaMask)</button>
                    <button class="btn btn-outline-primary">Casual</button>
                    <button class="btn btn-primary">Increase your minning speed</button>
                </div>

            </div>
        </div>

    </main>

</div>


<script>

 
</script>



<?php include("./temp/footer.php")?>