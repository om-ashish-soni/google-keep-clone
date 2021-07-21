<form id="goToHomeAfterCreating" action="index.php" method="POST" style="display:none">
<input name="type" value="home">
</form>
<?php
$username=$_SESSION['username'];
$title=$_POST['title'];
$content=$_POST['content'];

$link=mysqli_connect("localhost","root","",$username);
$sql="INSERT INTO notes (title,content) VALUES ('$title','$content')";
if($link->query($sql)){
    ?>
    <script>
        document.getElementById('goToHomeAfterCreating').submit();
    </script>
    <?php
}
?>