<?php include 'header.php'; ?>
<?php include 'side-menu.php'; ?>
<?php include 'users_models.php'; ?>
<div style="padding:50px; padding-left:6%;  padding-right:6%">



<a href="<?=base_url('Subscribers/subscriberes')?>">
<button style="margin-left:10px; float:right;background:#000;padding:7px;padding-left:20px; padding-right:20px; border-radius:10px; color:#fff;">View Emails</button>
</a>
<button data-toggle="modal" data-target="#sendEmail_Modal" style="float:right;background:#000;padding:7px;padding-left:20px; padding-right:20px; border-radius:10px; color:#fff;">Send Email</button>


      <p style="text-align:center; font-size:20px; font-weight:bold">All Website Subscribers</p>
      <table style="margin-top:40px;" id="bootstrap-data-table" class="table table-bordered">
      <tbody>
         <tr>
            <th>Category Name</th>
            <th>Email</th>
            <th>Subscribe Date Time</th>
            <th><span style="float:right;">Action</span></th>
         </tr>


      <?php
            foreach($users as $user) { 
      ?>
      <tr>
      <td><?=$user['category_name']?></td>
      <td><?=$user['subscribe_email']?></td>
      <td><?=$user['subscribe_datetime']?></td>
      <td>
      
        <button onclick="sendEmail_function(<?= $user['subscribe_id']?>)" data-toggle="modal" data-target="#sendEmailUser_Modal" class="pull-right btn"><i style="margin-right:8px;" class="fa fa-paper-plane"></i> Send Email </button>


      </td>

      </tr>
      <?php } ?>



      </tbody>
      </table>
      <center><div class="dataTables_paginate"><ul class="pagination"><?= $pagination; ?></ul></div></center>




</div>



















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
        <p style="margin-top:20px; font-size:18px; font-weight:bold; text-align:center;">Send Email</p>

                <select class="form-control" required name="category">
                    <option value="">Select Category</option>
                  <?php foreach($categories as $category) { ?>
                    <option value="<?=$category['category_id']?>"><?=$category['category_name']?></option>
                  <?php } ?>
                </select>

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






<!-- Start = Send Email User Model -->
<div class="modal fade" id="sendEmailUser_Modal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<form enctype="multipart/form-data" id="sendEmailUser_submitForm" class="form-horizontal">
<div class="modal-content">
<div class="modal-body">

<button type="button" style="font-size:14px; padding:3px; padding-left:5px; padding-right:5px; border-radius:50%; float:left; background:#000; color:#fff;" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>

    <br/>
    <div style="padding-left:30px; padding-right:30px;">
        <p style="margin-top:20px; font-size:18px; font-weight:bold; text-align:center;">Send Email</p>

        <input type="hidden" class="subscriber_id" name="subscriber_id">
        <p style="margin-top:20px; font-size:16px; font-weight:bold">Message:</p>
        <textarea name="message" class="content2"></textarea>

    </div>
</div>
    <center style="padding-bottom:20px;">
    <button type="submit" style="background:#000; padding:7px; padding-left:20px; padding-right:20px; border-radius:10px; color:#fff;">Submit</button>
    </center>
</div>
</form>
</div>
</div>
<!-- End = Send Email User Model -->







<?php include 'footer.php'; ?>
<script>
function sendEmail_function(id){
  $(".subscriber_id").val(id);
}




$(document).ready(function(){
      $('#sendEmail_submitForm').submit(function(e){
      e.preventDefault(); 
         $.ajax({
            url: "<?= base_url('Subscribers/send_email')?>",
            type:"post",
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function(data){ alert(data); }
         });
    });     

      $('#sendEmailUser_submitForm').submit(function(e){
      e.preventDefault(); 
         $.ajax({
            url: "<?= base_url('Subscribers/send_email_user')?>",
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
