<?php
session_start();
$type="login";
if(isset($_POST['type'])&& !empty($_POST['type'])){
    $type=$_POST['type'];
}
if($type=="login"){
    include("login.php");
}
else if($type=="signin_validate"){
    include("signin_validate.php");
}else if($type=="login_validate"){
    include("login_validate.php");
}else if($type=='home'){
    include('home.php');
}else if($type=="create"){
    include('create.php');
}else if($type="delete"){
    include('delete.php');
}else{
    echo "<h1 style='color:tomato'>You forgot to include $type file</h1>";
}
?>