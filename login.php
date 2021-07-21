<div id="login" >
<form action="index.php" method="POST">
<input type="hidden" name="type" value="login_validate" />
<input type="text" name="username" placeholder="Username" />
<input type="password" name="password" placeholder="password" />
<input type="submit">
</form>
</div>
<button onclick="switchForm()" id="switchBtn">New User?</button>

<div id="signin" style="display:none">
<form action="index.php" method="POST">
<input type="hidden" name="type" value="signin_validate" />
<input type="text" name="username" placeholder="Username" />
<input type="password" name="password" placeholder="password" />
<input type="password" name="confirmpassword" placeholder="confirm password" />
<input type="submit">

</form>
</div>
<script>
var count=0;
function switchForm(){
    const switchBtn=document.getElementById('switchBtn');
    count++;
    if(count%2){
        document.getElementById('signin').style.display="block";
        document.getElementById('login').style.display="none";
        switchBtn.innerHtml="Already a user?";
    }else{
        document.getElementById('login').style.display="block";
        document.getElementById('signin').style.display="none";
        switchBtn.innerHtml="New user?";
        
    }
}
</script>