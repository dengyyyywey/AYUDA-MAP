<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="transition.css">
    <link rel="stylesheet" href="log.css">
    <title>Login</title>
</head>
<body>
<div class="container">
<?php
    session_start();
    include 'connection.php';

    if (isset($_POST['submit'])) {
        $user = $_POST['user']; // Change 'user' to 'useremail'
        $pass = $_POST['userpassword']; // Change 'pass' to 'userpassword'

        $query = mysqli_prepare($db, "SELECT * FROM users WHERE username = ? AND password = ?");
        mysqli_stmt_bind_param($query, 'ss', $user, $pass);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $_SESSION["id"] = $row['user_id'];

            if ($row['role'] === 'admin') {
                header('Location: ../ad/index.php');
            } else {
                header('Location: ../map/map.php');
            }

            exit();
        } else {
            echo "<center><div class='alert alert-primary'>Username or Password does not match</div></center>";
        }
    }
?>

      <center>
        <table center border="0" style="margin: 0; padding: 10px; width: 40%;">
            <tr>
                <td>
                    <p class="header-text">Welcome!</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="sub-text">Login with your details to continue</p>
                </td>
            </tr>
            <tr>
                <form action="" method="POST" id="loginForm" onsubmit="return validateForm()">
                    <td class="label-td">
                        <label for="user" class="form-label">Username: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td">
                        <input type="username" name="user" class="input-text" id="user" placeholder="Username" required>
                    </td>
                </tr>
                <tr>
                    <td class="label-td">
                        <label for="userpassword" class="form-label">Password: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td">
                        <input type="password" name="userpassword" class="input-text" id="userpassword" placeholder="Password" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Login" class="login-btn btn-primary btn">
                    </td>
                </tr>
                </form>
                <tr>
                    <td width="10%">
                        <a href="../index.php" class="non-style-link"><p class="nav-item">Back</p></a>
                        <style>
                            .container {
  position: absolute;
  width: 600px;
  height: 500px;
  background: transparent;
  box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
  backdrop-filter: blur( 20px );
  -webkit-backdrop-filter: blur( 20px );
  border: 1px solid rgb(235, 235, 235);
  border-radius: 8px;
  margin-top: 120px;
  margin-left: 700px;
  padding: 0;
  box-shadow: 0 3px 5px 0 rgba(240, 240, 240, 0.3);
  animation: transitionIn-Y-over 0.5s;
}

.sub-text {
  font-size: 15px;
  color: White;
}

.form-label {
  color: white;
  text-align: left;
  font-size: 14px;
}
.sub-text {
  font-size: 15px;
  color: White

}
.form-label {
  color: white;
  text-align: left;
  font-size: 14px;
}

.header-text {
  font-weight: 600;
  color: white;
  font-size: 30px;
  letter-spacing: 1px;
  margin-bottom: 10px;
}
</style>
                    </td>
                </tr>
            </center>
        </table>
    </div>

    <script src="log.js"></script>
</body>
</html>
