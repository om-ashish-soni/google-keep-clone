<style>
.{
    font-family:helvetica;
}
input{
    outline:none;
}
.createNote{
    border:2px solid white;

}.cnoteForm{
}
.note{
    margin:20px;
    border-radius:4px;
    padding:5px;
    box-shadow:1px 2px 4px 3px gray;
    width:16%;
    float:left;
    word-wrap:break-word;
}

.cnoteBtn{
    border-radius:4px;
    padding:5px;
    box-shadow:1px 2px 4px 3px gray;
    outline:none;
    border:none;
    font-size:20px;
    width:30%;
    margin:5px;
}
.titleC{
    border-radius:4px;
    padding:5px;
    box-shadow:1px 2px 4px 3px gray;
    outline:none;
    border:none;
    font-size:24px;
    width:30%;
    margin:5px;
}
.createBtn{
    background-color:#ffc107;
    width:14.50%;
    margin:5px;
    margin-left:35%;
    font-size:20px;
    color:white;
    border:none;
    outline:none;
    float:left;
    border-radius:5px;
    box-shadow:1px 2px 4px 3px gray;
}
.closeBtn{
    background-color:#dc2545;
    width:14.50%;
    margin:5px;
    font-size:20px;
    color:white;
    border:none;
    float:left;
    outline:none;
    border-radius:5px;
    text-align:center;
    box-shadow:1px 2px 4px 3px gray;
}
.deleteBtn{
    background-color:#4284f3;
    width:90%;
    color:white;
    border:none;
    outline:None;
    border-radius:5px;
    box-shadow:1px 2px 4px 3px gray;
    font-size:20px;
}
.titleN{
    font-size:24px;
    font-family:helvetica;
}
.content{
    font-family:helvetica;
    font-size:18px;
}
.delete{
    text-align:center;
}
</style>
<?php
$username=$_SESSION['username'];
?>
<center>
<!-- <button   class="cnoteBtn"> -->
<input class="cnoteBtn" id="cnoteBtn" onclick="show_cnoteForm()"  placeholder="take a note ...">
<!-- </button> -->
<div id="cnoteForm" style="display:none">
<form class="createNote" action="index.php" method="POST">
<input type="hidden" name="type" value="create">
<strong><input type="text" name="title" class="titleC" placeholder="title" required/></strong>
<br>
<textarea name="content" placeholder="content" class="cnoteBtn">
</textarea><br>
<button type="submit" class="createBtn">create</button>
<button onclick="hide_cnoteForm()" value="close" class="closeBtn" >close</button><br>
</form>

</div>
</center>
<?php
$link=mysqli_connect("localhost","root","",$username);
$sql="SELECT * FROM notes";
$title=array();
$content=array();
$dt=array();
$id=array();
$count=0;
if($result=$link->query($sql)){
    while($row=$result->fetch_assoc()){
        array_push($title,$row['title']);
        array_push($content,$row['content']);
        array_push($dt,$row['dt']);
        array_push($id,$row['id']);
        $count++;
    }
    $id=array_reverse($id);
    $title=array_reverse($title);
    $content=array_reverse($content);
    for($i=0;$i<$count;$i++){
        ?>
        <div class="note">
            <div class="titleN">
                <strong><?php echo $title[$i]; ?></strong>
            </div>
            <div class="content">
                <p><?php echo $content[$i]; ?></p>
            </div>
            <div class="delete">
                <form action="index.php" method="POST">
                <input type="hidden" name="type" value="delete">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id[$i]); ?>">
                <button type="submit" class="deleteBtn" >delete</button>
                </form>
            </div>
        </div>
        <?php
    }

}
?>
<script>
function show_cnoteForm(){
    document.getElementById('cnoteForm').style.display="block";
    document.getElementById('cnoteBtn').style.display="none";
}
function hide_cnoteForm(){
    document.getElementById('cnoteForm').style.display="none";
    document.getElementById('cnoteBtn').style.display="block";
}
</script>