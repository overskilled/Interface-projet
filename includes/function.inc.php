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
        if ($row !== null) {
            $result = true;
        }
    }else {
        $result = false;
    }
    return $result;
}


//add a new manager
function  addManager($connect, $name, $email, $pwd, $tel, $address)
{
    $sql_request = "INSERT INTO manager (Name, Email, Password, Telephone, Address) VALUES (?, ?, ?, ?, ?);";
    $stmt        = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql_request)) {
        header("location: ../views/signup.php?error=statamentfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $pwd, $tel, $address);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../views/signup.php?error=signupsuccessful");
    exit();
}





//add new client to store
function Addclient($connect, $nom, $prenom, $tel, $address)
{
    $sql      = "INSERT INTO client (Nom, Prenom, Telephone, addresse) VALUE (?, ?, ?, ?);";
    $statment = mysqli_stmt_init($connect);

    //check if the statement doesm't succeed
    if (!mysqli_stmt_prepare($statment, $sql)) {
        header("location: ../client.php?error=statamentfailed");
        exit();
    }


    mysqli_stmt_bind_param($statment, "ssis",  $nom, $prenom, $tel, $address);
    mysqli_stmt_execute($statment);
    mysqli_stmt_close($statment);

    header("location: ../index.php?error=none");
    exit();
}



 
        
    
    
