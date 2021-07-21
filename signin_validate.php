<form id="goToHome" action="index.php" method="POST" style="display:none">
<input name="type" value="home">
</form>
<form id="goToLogin" action="index.php" method="POST" style="display:none">
<input name="type" value="login">
</form>
<?php
$username=$_POST['username'];
$link=mysqli_connect("localhost","root","");
$sql="CREATE DATABASE $username";
if($link->query($sql)){
    mysqli_close($link);
    $link_to_create_table=mysqli_connect("localhost","root","",$username);
    $sql_to_create_table="CREATE TABLE notes(
        id int NOT NULL AUTO_INCREMENT,
        title VARCHAR(255),
        content VARCHAR(255),
        dt VARCHAR(255),
        PRIMARY KEY (id)
    )";
    if($link_to_create_table->query($sql_to_create_table)){
        mysqli_close($link_to_create_table);
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
}else{
    ?>
    <script>
        document.getElementById('goToLogin').submit();
    </script>
    <?php
}

?>