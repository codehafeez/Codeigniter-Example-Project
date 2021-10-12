<?php include 'header.php'; ?>



<style>a:hover{ color:#fff; }</style>
<div class="sufee-login d-flex align-content-center flex-wrap">
<div class="container">
<div class="login-content">
<div class="login-form" style="background:#000;">
<center><img style="margin-bottom:20px; width:300px;" src="<?=base_url('images/logo.png')?>"></center>


<form enctype="multipart/form-data" id="submitForm" class="form-horizontal">
<div class="form-group"><input style="padding:8px; width:100%;" type="email" name="email" required placeholder="Email"></div>
<div class="form-group"><input style="padding:8px; width:100%;" type="password" name="password" required placeholder="Password"></div>
<a class="pull-right" href="<?=base_url('User/forgotPassword')?>">Forgot Password?</a>
<button type="submit" style="margin-top:20px; margin-bottom:20px;" class="btn btn-primary">Sign in</button>
</form>


<div class="m-t-15 text-center">
<p>Don't have account ? <a href="<?=base_url('User/signup')?>"> Sign Up Here</a></p>
</div>
</div>
</div>
</div>
</div>



<?php include 'footer.php'; ?>
<script>
$(document).ready(function(){
	$('#submitForm').submit(function(e){
    e.preventDefault(); 
         $.ajax({
			url: "<?= base_url('User/login_db')?>",
            type:"post",
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function(data){ 
				if(data == "success"){ location.reload(); }
				else {alert(data); }
			}
         });
    });  	
});
</script>
