
<?php

session_start();

// initializing variables
$username = "";
$errors = array();
$result="";
$fullName = "";
$university = "";
$batch = "";
$field = "";
$batch_royal = "";
$position = "";
$company = "";
$position_orepa = "";
$email ="";
$phoneNumber = "";
$comments = "";

// connect to the database
include ('DatabaseConnect.php');

// REGISTER USER
if (isset($_POST['add_member'])) {

    // receive all input values from the form
    $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    $university = mysqli_real_escape_string($conn, $_POST['university']);
    $batch = mysqli_real_escape_string($conn, $_POST['batch']);
    $field = mysqli_real_escape_string($conn, $_POST['field']);
    $batch_royal = mysqli_real_escape_string($conn, $_POST['batch_royal']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $company = mysqli_real_escape_string($conn, $_POST['company']);
    $position_orepa = mysqli_real_escape_string($conn, $_POST['position_orepa']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $comments = mysqli_real_escape_string($conn, $_POST['comments']);

    //form validating
    if (!preg_match("/^[0-9]+$/", $phoneNumber)) { array_push($errors, "Phone number can't contain letters"); }



    //checking the database for existing users
    $user_check_query = "SELECT * FROM members WHERE Mobile_No='$phoneNumber' OR Email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    // if user exists with the same user name or email
    if ($user) {
        if ($user['Mobile_No'] === $phoneNumber) {
            array_push($errors, "This Member already exists in the database");
        }

        if ($user['Email'] === $email) {
            array_push($errors, "This Member already exist in the database");
        }
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $query="INSERT INTO members VALUES('$fullName','$university',$batch,'$batch_royal','$field','$position','$company','$phoneNumber','$email','$position_orepa','$comments') ";
        mysqli_query($conn, $query);
        echo "<script type='text/javascript'>alert('Member Successfuly Added')</script>";
        //header('location: members.php');
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
    echo $username,$password;

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM accounts WHERE username='$username' AND password='$password'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: home.php');
        }else {
            array_push($errors, "Wrong username/password combination. Check Again");
        }
    }
}
if (isset($_POST['search'])) {

    // receive all input values from the form

    $university = mysqli_real_escape_string($conn, $_POST['university']);
    $batch = mysqli_real_escape_string($conn, $_POST['batch']);
    $field = mysqli_real_escape_string($conn, $_POST['field']);
    $batch_royal = mysqli_real_escape_string($conn, $_POST['batch_royal']);
    $company = mysqli_real_escape_string($conn, $_POST['company']);

    //form validating
  //  if (is_string($batch_royal) or is_string($batch)) { array_push($errors, "Batch of College or University can't contain letters"); }
    // creating query
    $query="SELECT * FROM members WHERE 1=1";
    if (!empty($university))     {$query .= " and University like '%$university%'";}
    if (!empty($batch))          {$query .= " and Batch=$batch";}
    if (!empty($field))          {$query .= " and Field like '%$field%'";}
    if (!empty($batch_royal))    {$query .= " and Batch_Royal_College=$batch_royal";}
    if (!empty($company))        {$query .= " and Company like '%$company%'";}

    $_SESSION['query']=$query;
    //checking the database for existing users
    if (count($errors) == 0) {
        $user_check_query = $query;
        $result = mysqli_query($conn, $user_check_query);
      //  $user = mysqli_fetch_assoc($result);
        }

}

?>