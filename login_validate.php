<form id="goToHome" action="index.php" method="POST" style="display:none">
<input name="type" value="home">
</form>
<form id="goToLogin" action="index.php" method="POST" style="display:none">
<input name="type" value="login">
</form>
<?php
$username=$_POST['username'];
$link=mysqli_connect("localhost","root","",$username);
$sql="SELECT * FROM notes";
if($link->query($sql)){
    $_SESSION['username']=$username;
    ?>
    <script>
        document.getElementById('goToHome').submit();
    </script>
    <?php
}else{
    ?>
    <script>
        document.getElementById('goToLogin').submit();
    </script>
    <?php
}
?>