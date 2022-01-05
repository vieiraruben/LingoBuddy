<?php
$pageTitle = "Account | LingoBuddy";
include "header.php";
?>

<?php

// if($_SERVER['REQUEST_METHOD']== "POST"){
//     // if something was posted
//     $user_name = $_POST['user_name'];
//     $password = $_POST['password'];

//     if(!empty($user_name)&& !empty($password) && !is_numeric($user_name)){

//         //$user_id = random_num(20);
//         $query = "insert into users (user_id, user_name, password) values ('$user_id','$user_name','$password')";

//         mysqli_query($dbConnection, $query);
//         header("Location : account-view.php");
//         die;
//     }else{
//         echo "Please enter a valid information!";
//     }
// }

function check_login($dbConnection){

    if(isset($_SESSION['user_id'])){

        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($dbConnection, $query);
        if($result && mysqli_num_rows($result) > 0){

            $user_data = mysqli_fetch_assoc($result);
            return $user_data;

        }
    }
    // redirect to login
    header("Location: account-view.php");
    die;
}

function random_num($length){
    $text = "";
    if($length < 5){
        $length = 5;
    }
    $len = rand(4,$length);
    for ($i=0; $i < $len; $i++) { 
        #---
        $text .= rand(0,9);
    }
    return $text;
}

?>

<div class="wrapper">
    <div class="text-center mt-4 name"> Login </div>
    <form class="p-3 mt-3" method="POST" action="account-view">
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="user_name" id="userName" placeholder="Username" required> </div>
        <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" id="pwd" placeholder="Password" required> </div> <button class="btn mt-3">Login</button>
    </form>
    <div class="text-center fs-6"> <a href="#">Forget password? </a> or <a href="signup.php"> Sign up</a> </div>
</div>
<?php include "footer.php"; ?>