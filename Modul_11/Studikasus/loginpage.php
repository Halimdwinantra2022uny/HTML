    <!-- PHP -->
<?php
    //menggunakan session
    session_start();
    include("koneksi.php");
    if(isset($_POST['login'])) {
        $user = $_POST['username']; //mengambil id
        $pass = $_POST['password']; //mengambil password
        $query = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
        $result = mysqli_query($koneksi, $query);
        // Digunakan untuk membuat session
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $user;
            header("location: dashboard.php");
        } else {
            $message = "<span style='color:black; font-size:20px; text-align:center'>Username atau Password Salah! Silakan Coba Lagi</span>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Merupakan Script Javascript -->
    <script type="text/javascript">
        function validateForm() {
            var username = document.forms["loginForm"]["username"].value;
            var password = document.forms["loginForm"]["password"].value;
            if (username == "" || password == "") {
                alert("Username dan Password tidak boleh kosong.");
                if (username == "") {
                    document.forms["loginForm"]["username"].focus();
                } else {
                    document.forms["loginForm"]["password"].focus();
                }
                return false;
            } else if (!/^[a-zA-Z]+$/.test(username) || !/^[a-zA-Z]+$/.test(password)) {
                alert("Username dan Password harus huruf.");
                return false;
            }
        }
    </script>
<style>
*{
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Poppins', sans-serif;
}
body{
	background-color: #675D50;
}
.login-box{
	width: 550px;
	height: 600px;
	background: #FCC8D1;
	color: #fff;
	top: 50%;
	left: 50%;
	position: absolute;
	transform: translate(-50%,-50%);
	box-shadow: 5px 5px 10px rgba(0,0,0,0);
	padding: 70px 30px;
}
.login-box h2{
	margin: 0;
	padding: 0 0 100px;
	font-size: 35px;
	text-align: center;
    color: black;
}
.user-box{
	position: relative;
}
.user-box input{
	width: 100%;
	padding: 10px 0;
	font-size: 25px;
	color: #fff;
	margin-bottom: 30px;
	border: none;
	border-bottom: 1px solid #fff;
	outline: none;
	background: transparent;
}
.user-box label{
	position: absolute;
	top: 0;
	left: 0;
	padding: 10px 0;
	font-size: 25px;
	color: #000000;
	pointer-events: none;
	transition: 0.5s;
}
.user-box input:focus ~ label,
.user-box input:valid ~ label{
	top: -30px;
	left: 0;
	color: #000000;
	font-size: 25px;
}
.user-box input:focus,
.user-box input:valid{
	border-bottom: 2px solid #000000;
}
input[type="submit"]{
	background: transparent;
	border: none;
	outline: none;
	color: #fff;
	background: #000000;
	padding: 30px 40px;
	cursor: pointer;
	border-radius: 5px;
	margin-top: 65px;
    position: absolute;
    left: 20%;
    right: 20%;
}
</style>
</head>
<body style=background:url("https://i.pinimg.com/originals/d2/0a/2b/d20a2bce9fce929f8f213c5962d0661e.jpg");>
<div class="login-box">
        <h2>Login Dulu Bang</h2>

        <form name="loginForm" action="<?php $_SERVER['PHP_SELF']?>" method="post" onsubmit="return validateForm()">
            <!-- Class usernmame -->
            <div class="user-box">
                <input type="text" name="username" id="username">
                <label for="username">Username</label>
            </div>
            <!-- Class password -->
            <div class="user-box">
                <input type="password" name="password" id="password">
                <label for="password">Password</label>
            </div>
            <?php if (isset($message)) : ?>
                <div class="message">
                    <?= $message ?>
                </div>
            <?php endif; ?>
        <input class="submit-button" type="submit" value="Login" name="login">
    </form>
    </div>
</body>
</html>