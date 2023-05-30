<?php 
    include("./temp/connection.php") ;
    include("./temp/header.php");

    // go to home page if user is already log in
    session_start();
    if($_SESSION){
        header("location: index.php");
    }

    $error = ["email" => "" ,"pass1" => ""];
    $email = $pass1 = "";

    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $pass1 = $_POST["pass1"];


        // check if a user exist
        $sqlGet = "SELECT * FROM userstable WHERE email = '$email' and password = '$pass1' ";
        $result = mysqli_query($connection,$sqlGet);
        $datas = mysqli_fetch_assoc($result);


        if(mysqli_num_rows($result) > 0){
            session_start();
            $_SESSION["fname"] = $datas["firstname"];
            $_SESSION["lname"] = $datas["lastname"];
            $_SESSION["email"] = $datas["email"];
            header("location: index.php");
        }else{
            $error["email"] = "Password or Email is incorrect";
            $error["pass1"] = "Password or Email is incorrect"; 
        }

        if(empty($pass1)){
            $error["pass1"] = "Password must not be empty";    
        }

        if(empty($email)){
            $error["email"] = "Email address must not be empty";    
        }

    }

    
?>

<div class="reg-page">

    <form action="login.php" method="POST">
        <h1>Login into your account</h1>
        <p>Don't have an account <a href="register.php">Register</a> today</p>
        <label for="">Email</label>
        <input type="email" name="email" id="" placeholder="Enter your email address" value="<?php echo $email ?>">
        <span class="error"><?php echo $error["email"] ?></span>

        <label for="">Password</label>
        <input type="password" name="pass1" id="" placeholder="Enter your password" value="<?php echo $pass1 ?>">
        <span class="error"><?php echo $error["pass1"] ?></span>

        <button class="btn btn-dark" name="submit">Login</button>
    </form>

</div>


   

<?php 
    include("./temp/footer.php") ;
?>