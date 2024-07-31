<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Log in to the Photo Editor</title>
</head>

<body>

    <?php

    $phone = $loginpassword =  NULL;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['phone'])) {
            $phone = $_POST['phone'];
        }

        if (!empty($_POST['password'])) {
            $loginpassword = $_POST['password'];
        }
    }

    // establishing connection
    include "./conection.php";


    $sql = "SELECT * FROM logindetails WHERE phone ='$phone' and password = '$loginpassword' ";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        $founditem = mysqli_num_rows($res);


        if ($founditem > 0) {
            session_start();
            $_SESSION['customer'] = $row['fullname'];
            $_SESSION['id'] = 1;
            header("location: ./home.php");
        } else if ($founditem == 0 &&  (!empty($_POST['phone']) || !empty($_POST['password']))) {
            echo "<script> alert('login credentials is not matching.')</script>";
        } else {
            echo "<script> alert('Please enter Phone and Number :')</script>";
        }
    }

    ?>

    <div class="sign-in-container container">
        <h1>Sign In</h1>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div class="form-item">
                <label for="phone">Phone :</label>
                <input type="number" name="phone" id="phone">
            </div>

            <div class="form-item">
                <label for="password">Password :</label>
                <input type="text" name="password" id="password">
            </div>

            <div class="form-item buttons">
                <button type="submit" name="submit" value="submit"> Login </button>
                <button type="reset">Reset</button>
            </div>
        </form>

        <div class="container-footer signup">
            <p>I don't have an account </p>
            <a href="./signup.php">Sign Up</a>
        </div>
    </div>

</body>

</html>