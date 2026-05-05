<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [['username' => 'bob', 'password' => '123', 'name' => 'Bob', 'email' => 'bob@aiub.edu', 'gender' => 'Male', 'dob' => '19/09/1998']];
}

$view = isset($_GET['page']) ? $_GET['page'] : 'home';

if (isset($_POST['register'])) {
    $_SESSION['users'][] = ['name' => $_POST['n'], 'email' => $_POST['e'], 'username' => $_POST['u'], 'password' => $_POST['p'], 'gender' => $_POST['g'], 'dob' => $_POST['d']];
    echo "Registration Done. <a href='?page=login'>Go to Login</a>";
    exit();
}

if (isset($_POST['login'])) {
    foreach ($_SESSION['users'] as $u) {
        if ($u['username'] == $_POST['u'] && $u['password'] == $_POST['p']) {
            $_SESSION['curr'] = $u;
            echo "Login Success. <a href='?page=dashboard'>Go to Dashboard</a>";
            exit();
        }
    }
}

if ($view == 'logout') {
    session_destroy();
    echo "Logged out. <a href='?page=home'>Back Home</a>";
    exit();
}
?>
<html>
<body>
    <table border="1" width="100%" cellpadding="10">
        <tr>
            <td>X-Company</td>
            <td align="right">
                <a href="?page=home">Home</a> | 
                <a href="?page=login">Login</a> | 
                <a href="?page=reg">Register</a>
            </td>
        </tr>
        <tr height="200">
            <td colspan="2">
                <?php
                if($view == 'reg'){
                    echo '<form method="post">Name: <input name="n"><br>User: <input name="u"><br>Pass: <input name="p"><br><input type="submit" name="register"></form>';
                } elseif($view == 'login'){
                    echo '<form method="post">User: <input name="u"><br>Pass: <input name="p"><br><input type="submit" name="login"></form>';
                } elseif(isset($_SESSION['curr'])){
                    echo "Welcome, " . $_SESSION['curr']['name'];
                } else {
                    echo "Welcome to X-Company";
                }
                ?>
            </td>
        </tr>
    </table>
</body>
</html>