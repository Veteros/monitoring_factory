<?php
    $db = mysqli_connect('localhost', 'root', '', 'monitoring_users');
    session_start();

    if (!isset($_SESSION['user_id'])) {

    if (isset($_POST['do_login'])) {
        $user_name = mysqli_real_escape_string($db, trim($_POST['login']));
        $user_password = mysqli_real_escape_string($db, trim($_POST['password']));

        if (!empty($user_name) && !empty($user_password)) {
            $query = "SELECT user_id, login FROM users WHERE
                        login = '$user_name' AND password = SHA('$user_password')";
            $data = mysqli_query($db, $query);

            if (mysqli_num_rows($data) == 1) {
                $row = mysqli_fetch_assoc($data);
                $_SESSION['logged_user_id'] = $row['user_id'];
                echo "You are login succesfully";
            } else {
                echo "Invalid login or password";
            }
        } else {
            echo "Login or password is empty, or invalid value";
        }
    }

}
?>