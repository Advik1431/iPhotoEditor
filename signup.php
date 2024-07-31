<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>

<body>

    <?php
    $errormsg = "";
  
    $name = $phone=$email=  $loginpassword = NULL;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (!empty($_POST['name'])) {
            $name = $_POST['name'];
        }
        if (!empty($_POST['phone'])) {
            $phone = $_POST['phone'];
        }
        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
        }
        if (!empty($_POST['password'])) {
            $loginpassword = $_POST['password'];
        }
        

    }


    //Establishing a connection to mysql

// $servername="localhost";
// $username ="root";
// $password="";

// $conn = mysqli_connect($servername,$username,$password,"db");

include "./conection.php";
if(!$conn){
    die("error" . mysqli_connect_error());
}
else{
    if(isset($name) and isset($phone) and isset($loginpassword)){

    $sql = "INSERT INTO logindetails(fullname, phone, email, password)
VALUES('$name','$phone','$email','$loginpassword')";


mysqli_query($conn,$sql);
    }
}

    ?>


    <div class="sign-up-container container">

        <h1> Register </h1>

        <?php 
        if(isset($_POST['submit'])){
           if(isset($name) and isset($phone) and isset($password)){
            echo "Registeration Succesfully..";
            // print_r($_POST);
           }
           else{
            echo "<span>";
            echo  "Registeration Unsuccesfully."."<br>". "Please fill all mendatory inputs.";
            echo "</span>";
           }
    }
         ?>

        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div>
                <label for="name">Name : </label>
                <input type="text" name="name" id="name" > <span> *</span>
            </div>
            <div>
                <label for="phone">Phone No : </label>
                <input type="Number" name="phone" id="phone" /> <span> *</span>
            </div>
            <div>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email"> <span> *</span>
            </div>
            <div>
                <label for="password">password : </label>
                <input type="text" name="password" id="password"> <span> *</span>
            </div>

            <div class="buttons">
                <button type="submit" name="submit">Submit</button>
                <button type="reset">Reset</button>
            </div>
        </form>

        <div class="container-footer signin">
            <p> I have an account </p>
            <a href="./index.php">sign in</a>
        </div>

    </div>






</body>

</html>