<?php
   include('connect.php');
    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $sql = "SELECT `Email`, `Password` FROM `coordonnees` WHERE Email = '$username' and Password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            header("Location: welcome.php");
        }  
        else{  
            echo  ' <script>
                        window.location.href = "login.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }     
    }

//use LDAP\Result;

    /*if(isset($_POST['submit'])) {
        $username = $_POST["user"];
        $password = $_POST["pass"];

        include("connect.php");

        $query = "SELECT `Email`, `Password` FROM `coordonnees` WHERE Email ='$username' AND Password = $password'";

        $result = $conn->query($query);
        if($result->num_rows == 0){
            header("Location:welcome.php");
            exit();
        }
        else{
            header("Location:login.php");
            exit();
        }
    }*/
   /* if (isset($_POST['submit'])){
        $username = $_POST['user'];
        $password = $_POST['pass'];

// Query to check user credentials
$sql = "SELECT * FROM coordonnees WHERE Email = '$username'";
$result = mysqli_query($connection, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    if (password_verify($password, $user['password'])) {
        // Valid login: Redirect to a welcome page or perform other actions
        header("Location:welcome.php");
        echo "Welcome, {$user['username']}!";
    } else {
        echo "Invalid password.";
    }
} else {
    echo "User not found.";
}
   }*/   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Login/Style.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="wrapper">
        <form action="login.php" method="post">
            <h1>Login</h1>
            <h4>Welcome to Doggydog Store, please fill-in with your informations to connect</h4>
            <div class="input_box">
                <input type="text" placeholder="username/email" required name="user" id="user">
                <ion-icon name="person-outline"></ion-icon>
            </div>
            <div class="input_box">
                <input type="password" placeholder="password" required name="pass" id="pass">
                <ion-icon name="lock-closed-outline"></ion-icon>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Rememeber me</label>
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit" class="btn" id="submit" name="submit">Login</button>
            <div class="register-link">
                <p>Don't you have an account? <a href="Sign-up.php">Sign-up</a></p>
            </div>
        </form>
    </div>
</body>
<footer>
    <a href="index.htm">©BGM Store</a>
</footer>
</html>