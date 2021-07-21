<form id="goToHomeAfterDeleting" action="index.php" method="POST" style="display:none">
<input name="type" value="home">
</form>
<?php
    $username=$_SESSION['username'];
    $id=$_POST['id'];
    $link=mysqli_connect("localhost","root","",$username);
    $sql="DELETE FROM notes WHERE id='$id' ";
    if($link->query($sql)){
        ?>
        <script>
        document.getElementById('goToHomeAfterDeleting').submit();
    </script>
        <?php
    }

?>