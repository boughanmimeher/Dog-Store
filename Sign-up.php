<?php 
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: login.php");
    }
?>
<?php
    include("connect.php");
    if(isset($_POST['envoyer'])){
        $fname = mysqli_real_escape_string($conn, $_POST['First_name']);
        $lname = mysqli_real_escape_string($conn, $_POST['last_name']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['pass']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpass']);
        
       /* $sql="SELECT * FROM `coordonnees` WHERE fname='$fname'";
        $result = mysqli_query($conn, $sql);
        $count_user = mysqli_num_rows($result);*/

        $sql="SELECT * FROM `coordonnees` WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $count_email = mysqli_num_rows($result);

        if($count_user == 0 & $count_email==0){
            if($password==$cpassword){
                //$hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `coordonnees`(`First name`, `Last name`, `Téléphone`, `Email`, `Password`) VALUES('$fname','$lname', '$phone', '$email', '$password')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    header("Location: login.php");
                }
            }
            else{
                echo '<script>
                    alert("Passwords do not match");
                    window.location.href = "sign-up.php";
                </script>';
            }
        }
        else{
            if($count_user>0){
                echo '<script>
                    window.location.href="index.php";
                    alert("Username already exists!!");
                </script>';
            }
            if($count_email>0){
                echo '<script>
                    window.location.href="index.php";
                    alert("Email already exists!!");
                </script>';
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
    <link rel="stylesheet" href="Sign-up/Style.css">
</head>
<body>
    <div class="sign-upBox">
    <form action="Sign-up.php" method="post">
        <header>
            <h1>Sign-up</h1>
            <h4>Welcome to our Doggydog Store. Please fill this form</h4>
            <figure class="img1">
                <img src="Images/signupdog.jpeg">
            </figure>
        </header>
                <label for=" ">First name:</label>
                <input type="text" required placeholder="First name" name="First_name" id="First_name">
                <label for="">Last name:</label>
                <input type="text" required placeholder="Last name" name="last_name" id="last_name">
                <label for="">Tel:</label>
                <input type="tel" placeholder="12345678" name="phone" id="phone">
                <label for="">Email</label>
                <input type="email" required placeholder="Write your email" name="email" id="email">
                <label for="">password:</label>
                <input type="password" id="Password" required name="pass" id="pass">
                <label for="">Confirm password:</label>
                <input type="password" id="cpass"  name="cpass" required >
                <input type="submit" value="Submit" name="envoyer">
                <h3>You already have an account?</h3>
                <a href="Login.php">Login</a>
            </div>
            <p>Whoever said you can’t buy happiness forgot little puppies.</p>
    </form>
</body>
<footer>
    <a href="index.htm">©BGM Store</a>
</footer>
</html>