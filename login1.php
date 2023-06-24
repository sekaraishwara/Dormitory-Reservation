<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        if($row['level']=="admin"){
 
            $_SESSION['email'] = $email;
            $_SESSION['level'] = "admin";
            header("location:admin_page.php");
    
        }else if($row['level']=="user"){
            $_SESSION['email'] = $email;
            $_SESSION['level'] = "user";
            header("location:user_page.php"); 
        }else{
            header("location:login1.php");
        }
    } else {
        echo "<script>alert('Your email or password is incorrect. Please try again!')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style1.css">
 
    <title>Login Page</title>
</head>
<body>
    <div class="alert alert-warning" role="alert">
        <?php echo $_SESSION['error']?>
    </div>
 
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
            <p class="login-register-text">You don't have an account yet? <a href="register.php">Register</a></p>
        </form>
    </div>
</body>
</html>