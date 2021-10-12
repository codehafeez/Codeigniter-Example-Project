<?php include 'header.php'; ?>
<?php include 'side-menu.php'; ?>
<div style="padding:50px; padding-left:6%;  padding-right:6%">



<?php if($_SESSION["session_user_type"] == 'admin'){ ?>
<a style="float:left;background:#000;padding:7px;padding-left:20px; padding-right:20px; border-radius:10px; color:#fff;" href="<?=base_url('User/all_users')?>">View All Uses</a>
<a style="float:left;background:#000;padding:7px;padding-left:20px; margin-left:10px; padding-right:20px; border-radius:10px; color:#fff;" href="<?=base_url('Subscribers')?>">View All Subscribers</a>
<?php } else { ?>

<a href="<?=base_url('User/all_emails')?>">
<button style="background:#000;padding:7px;padding-left:20px; padding-right:20px; border-radius:10px; color:#fff;">View Emails</button>
</a>
<button data-toggle="modal" data-target="#sendEmail_Modal" style="background:#000;padding:7px;padding-left:20px; padding-right:20px; border-radius:10px; color:#fff;">Send Email</button>


<?php } ?>
<a style="float:right; background:#000; padding:7px; padding-left:20px; padding-right:20px; border-radius:10px; color:#fff;" href="<?=base_url('logout')?>">Logout</a>
<div style="clear:both;"></div>





<style>
.table-bordered { border: 2px solid #dee2e6 !important; }
.col_component_spance{ margin:10px; }
</style>
<div class="row">
<div class="col-md-12">
      <table style="margin-top:10px;" id="bootstrap-data-table" class="table table-bordered">
      <tbody>
         <tr>
            <th>Name</th>
            <th>Email</th>
            <th><span style="float:right;">Action</span></th>
         </tr>

      <tr>
      <td><?=$_SESSION["session_user_name"]?></td>
      <td><?=$_SESSION["session_user_email"]?></td>
      <td>
            <div style="float:right;">
            <button data-toggle="modal" data-target="#edit_model" class="btn"><i style="margin-right:8px;" class="fa fa-edit "></i> Edit</button>
            <button data-toggle="modal" data-target="#change_password_model" class="btn"><i style="margin-right:8px;" class="fa fa-lock "></i> Change Password</button>
            </div>
      </td>
      </tr>



      </tbody>
      </table>
      </div>
</div>
</div>



<?php include 'footer.php'; ?>









<!-- Start = Edit Model -->
<div class="modal fade" id="edit_model" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
<div class="modal-dialog modal-md" role="document">
<form enctype="multipart/form-data" id="update_submitForm" class="form-horizontal">
<div class="modal-content">
<div class="modal-body">

<button type="button" style="font-size:14px; padding:3px; padding-left:5px; padding-right:5px; border-radius:50%; float:left; background:#000; color:#fff;" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>

      <div style="padding-left:30px; padding-right:30px;">
            <p style="margin-top:20px; font-size:18px; text-align:center; font-weight:bold">Change Profile Name</p>
            <div class="row">
                  <input style="width:100%" type="text" value="<?=$_SESSION["session_user_name"]?>" placeholder="Name" name="name" class="form-control-sm">
            </div>
      </div>
</div>
<div class="modal-footer">
<button type="button" class="btn" data-dismiss="modal">Cancel</button>
<button type="submit" class="btn"><i style="margin-right:10px;" class="fa fa-refresh"></i>Yes Update</button>
</div>
</div>
</form>
</div>
</div>
<!-- End = Edit Model -->





<!-- Start = Chagne Password Model -->
<div class="modal fade" id="change_password_model" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
<div class="modal-dialog modal-md" role="document">
<form enctype="multipart/form-data" id="change_password_submitForm" class="form-horizontal">
<div class="modal-content">
<div class="modal-body">

<button type="button" style="font-size:14px; padding:3px; padding-left:5px; padding-right:5px; border-radius:50%; float:left; background:#000; color:#fff;" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>

      <div style="padding-left:30px; padding-right:30px;">
            <p style="margin-top:20px; font-size:18px; text-align:center; font-weight:bold">Change Password</p>
            <div class="row">
                  <input style="width:100%" type="Password" placeholder="Old Password" name="password" class="name form-control-sm">
                  <input style="margin-top:20px; width:100%" type="Password" placeholder="New Password" name="name" class="name form-control-sm">
            </div>
      </div>
</div>
<div class="modal-footer">
<button type="button" class="btn" data-dismiss="modal">Cancel</button>
<button type="submit" class="btn"><i style="margin-right:10px;" class="fa fa-refresh"></i>Yes Update</button>
</div>
</div>
</form>
</div>
</div>
<!-- End = Chagne Password Model -->








<!-- Start = Send Email Model -->
<div class="modal fade" id="sendEmail_Modal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<form enctype="multipart/form-data" id="sendEmail_submitForm" class="form-horizontal">
<div class="modal-content">
<div class="modal-body">

<button type="button" style="font-size:14px; padding:3px; padding-left:5px; padding-right:5px; border-radius:50%; float:left; background:#000; color:#fff;" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>

    <br/>
    <div style="padding-left:30px; padding-right:30px;">
      
         <p style="margin-top:20px; font-size:18px; font-weight:bold; text-align:center;">Send Email To Admin</p>
         <p style="margin-top:20px; font-size:16px; font-weight:bold">Message:</p>
         <textarea name="message" class="content"></textarea>

    </div>
</div>
    <center style="padding-bottom:20px;">
    <button type="submit" style="background:#000; padding:7px; padding-left:20px; padding-right:20px; border-radius:10px; color:#fff;">Submit</button>
    </center>
</div>
</form>
</div>
</div>
<!-- End = Send Email Model -->




<script>
$(document).ready(function(){

      $('#sendEmail_submitForm').submit(function(e){
      e.preventDefault(); 
         $.ajax({
            url: "<?= base_url('User/send_email_admin')?>",
            type:"post",
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function(data){ alert(data); }
         });
    });     



      $('#update_submitForm').submit(function(e){
      e.preventDefault(); 
         $.ajax({
            url: "<?= base_url('User/change_user_name')?>",
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


      $('#change_password_submitForm').submit(function(e){
      e.preventDefault(); 
         $.ajax({
            url: "<?= base_url('User/change_user_password')?>",
            type:"post",
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function(data){ alert(data); }
         });
    });     
});
</script>

