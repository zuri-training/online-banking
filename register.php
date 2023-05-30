<?php 
    include("./temp/connection.php") ;
    include("./temp/header.php");

    // go to home page if user is log 
    session_start();
    if($_SESSION){
        header("location: index.php");
    }

    $error = ["fname" => "" ,"lname" => "" ,"email" => "" ,"pass1" => "" ,"pass2" => "" ];
    $fname = $lname = $email = $pass1 = $pass2 = "";

    if(isset($_POST["submit"])){
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $pass1 = $_POST["pass1"];
        $pass2 = $_POST["pass2"];

        // check if a user exist
        $sqlGet = "SELECT * FROM userstable WHERE email = '$email'";
        $result = mysqli_query($connection,$sqlGet);
        $datas = mysqli_fetch_all($result,MYSQLI_ASSOC);

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error["email"] = "Email address is invalid";
        }elseif(mysqli_num_rows($result) > 0){
            $error["email"] = "User Already Exist";
                
        }
        
        // check if input is Empty
        if(empty($fname)){
            $error["fname"] = "First Name is empty";
        }

        if(empty($lname)){
            $error["lname"] = "Last Name is empty";
        }

        if(empty($pass1)){
            $error["pass1"] = "Password is empty";
        }elseif(strlen($pass1) <= 5){
            $error["pass1"] = "Password must be greater than 6";
        }

        if($pass1 != $pass2){
            $error["pass2"] = "Password does not match";
        }

        if(array_filter($error)){
            // nothing happen
        }else{
            // insert data into the table
            $sql = "INSERT INTO userstable(firstname , lastname , email , password) VALUE('$fname','$lname','$email','$pass1')";
            if(mysqli_query($connection ,$sql)){
                header("location: login.php");
            }else{
                echo "bad" . mysqli_error($connection);
            }
        }

    }
?>

<div class="reg-page">

    <form action="register.php" method="POST">
        <h1>Register an account</h1>
        <p>Already have an account <a href="login.php">Login</a></p>
        <label for="">First Name</label>
        <input type="text" name="fname" id="" placeholder="Enter your first name" value="<?php echo $fname ?>">
        <span class="error"><?php echo $error["fname"] ?></span>

        <label for="">Last Name</label>
        <input type="text" name="lname" id="" placeholder="Enter your last name" value="<?php echo $lname ?>">
        <span class="error"><?php echo $error["lname"] ?></span>

        <label for="">Email</label>
        <input type="email" name="email" id="" placeholder="Enter your email address" value="<?php echo $email ?>">
        <span class="error"><?php echo $error["email"] ?></span>

        <label for="">Password</label>
        <input type="password" name="pass1" id="" placeholder="Enter your password" value="<?php echo $pass1 ?>">
        <span class="error"><?php echo $error["pass1"] ?></span>

        <label for="">Confirm Password</label>
        <input type="password" name="pass2" id="" placeholder="confirm your password" value="<?php echo $pass2 ?>">
        <span class="error"><?php echo $error["pass2"] ?></span>

        <button class="btn btn-dark" name="submit">Submit Form</button>
    </form>

</div>


   

<?php 
    include("./temp/footer.php") ;
?>