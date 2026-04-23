<?php
session_start();
include("config.php");

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['user'] = mysqli_fetch_assoc($result);
        header("Location: dashboard.php");
    } else {
        $error = "Invalid Login";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

/* BACKGROUND */
body {
    margin: 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Segoe UI';
    background: linear-gradient(135deg,#667eea,#764ba2);
}

/* GLASS CARD */
.login-card {
    width: 380px;
    padding: 30px;
    border-radius: 20px;
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(12px);
    box-shadow: 0 8px 32px rgba(0,0,0,0.2);
    color: white;
}

/* TITLE */
.login-card h3 {
    text-align: center;
    margin-bottom: 25px;
    font-weight: bold;
}

/* INPUT GROUP */
.input-group {
    background: rgba(255,255,255,0.2);
    border-radius: 10px;
    margin-bottom: 15px;
    padding: 5px;
}

.input-group i {
    color: white;
    padding: 10px;
}

.input-group input {
    border: none;
    background: transparent;
    color: white;
}

.input-group input::placeholder {
    color: #ddd;
}

/* BUTTON */
.btn-login {
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    border: none;
    background: white;
    color: #764ba2;
    font-weight: bold;
    transition: 0.3s;
}

.btn-login:hover {
    background: #ddd;
}

/* LINK */
a {
    color: #fff;
}

</style>

</head>

<body>

<div class="login-card">

    <h3>Welcome Back 👋</h3>

    <?php if(isset($error)) echo "<p class='text-warning'>$error</p>"; ?>

    <form method="POST">

        <!-- EMAIL -->
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>

        <!-- PASSWORD -->
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            <i class="fas fa-eye" onclick="togglePassword()" style="cursor:pointer;"></i>
        </div>

        <button name="login" class="btn-login">Login</button>

    </form>

    <p class="mt-3 text-center">
        Don't have account? <a href="register.php">Register</a>
    </p>

</div>

<script>
function togglePassword(){
    let pass = document.getElementById("password");
    pass.type = (pass.type === "password") ? "text" : "password";
}
</script>

</body>
</html>