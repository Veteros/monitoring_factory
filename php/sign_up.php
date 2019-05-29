<?php
    $db = mysqli_connect('localhost', 'root', '', 'monitoring_users');

    if (isset($_POST['submit'])) {
        $login = mysqli_real_escape_string($db, trim($_POST['login']));
        $password = mysqli_real_escape_string($db, trim($_POST['password']));
        $password2 = mysqli_real_escape_string($db, trim($_POST['password-conf']));
        
        if (!empty($login) && !empty($password) && !empty($password2) && ($password == $password2)) {
            $query = "SELECT * FROM users WHERE login = '$login'";
            $data = mysqli_query($db, $query);
            
            if (mysqli_num_rows($data) == 0) {
                $query = "INSERT INTO users (login, password) VALUES ('$login', SHA('$password'))";
                mysqli_query($db, $query);
                echo "You are register is successfully";
                mysqli_close($db);
                exit();
            } else {
                echo "Login or password is already exists";
            }
        }
    }
?>