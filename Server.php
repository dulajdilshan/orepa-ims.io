
<?php

session_start();

// initializing variables
$username = "";
$errors = array();

// connect to the database
include ('DatabaseConnect.php');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    echo "DD";

    // receive all input values from the form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);

    //form validating
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }


    //checking the database for existing users
    $user_check_query = "SELECT * FROM accounts WHERE Username='$username' OR Email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    // if user exists with the same user name or email
    if ($user) {
        if ($user['Username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['Email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $query="INSERT INTO restaurants(Name,Location,Contact,Type,Accounts_Username)VALUES('$name','$location',$contact,'$type','$username') ";
        mysqli_query($conn, $query);
        $password = md5($password_1);
        $query = "INSERT INTO accounts (Username, Email, Password) VALUES('$username', '$email', '$password')";
        mysqli_query($conn, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: about.php');
    }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM accounts WHERE username='$username' AND password='$password'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: about.php');
        }else {
            array_push($errors, "Wrong username/password combination. Check Again");
        }
    }
}

?>