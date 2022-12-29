<?php

include_once '..\includes\db.inc.php';
//finction to check if a field in the form is empty
function signupFormEmpty($name, $email, $tel, $address, $pwd, $pwdRepeat)
{
    $result;
    if (empty($name) || empty($email) || empty($tel) || empty($address) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

//Check if the email format is correct
function invaidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

//check is the password mathches the confirm password
function pwdMatch($pwd, $pwdRepeat)
{
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

//check if email has already been registered
function emailExist($connect, $email)
{
    $result;
    $sql_request = "SELECT * FROM manager WHERE Email = ?;";
    $stmt        = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql_request)) {
        header("location: ../views/signup,php?error=StmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }else {
        return $result = false;
    }
}


//add a new manager
function addManager($connect, $name, $email, $pwd, $tel, $address)
{
    $sql_request = "INSERT INTO manager (Name, Email, Password, Telephone, Address) VALUES (?, ?, ?, ?, ?);";
    $stmt        = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql_request)) {
        header("location: ../views/signup.php?error=statamentfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssis", $name, $email, $hashedPwd, $tel, $address);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../views/signup.php?error=signupsuccessful");
    exit();
}





//check for empty fields in login form
function loginFormEmpty($email, $pwd)
{
    $result;
    if (empty($email) || empty($pwd)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function loginManager($connect, $email, $pwd) {
    $emailExists = emailExist($connect, $email);

    if ($emailExists === false) {
        header("location: ../views/login.php?error=wronglogin");
        exit();
    }

    $hashedPwd = $emailExists['Password'];
    $checkpwd  = password_verify($pwd, $hashedPwd);

    if ($checkpwd === false) {
        header("location: ../views/login.php?error=incorrectpassword");
        exit();
    }elseif ($checkpwd === true) {
        session_start();
        $_SESSION['Id']    = $emailExists['Id'];
        $_SESSION['email'] = $emailExists['Email'];
        $_SESSION['name']  = $emailExists['Name'];
        header("location: ../views/login.php?error=none");
    }

}
    
