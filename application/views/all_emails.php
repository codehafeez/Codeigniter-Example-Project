<?php include 'header.php'; ?>
<?php include 'side-menu.php'; ?>
<?php include 'users_models.php'; ?>
<div style="padding:50px; padding-left:6%;  padding-right:6%">




      <p style="text-align:center; font-size:20px; font-weight:bold">View All Send Emails</p>
      <table style="margin-top:40px;" id="bootstrap-data-table" class="table table-bordered">
      <tbody>
         <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Send Email Date Time</th>
            <th><span style="float:right;">Action</span></th>
         </tr>


      <?php
            foreach($emails_data as $email) { 
      ?>
      <tr>
      <td><?=$email['user_name']?></td>
      <td><?=$email['user_email']?></td>
      <td><?=$email['send_datetime']?></td>
      <td><a href="<?=base_url('User/viewEmail/'.$email['send_id'])?>" class="pull-right btn"><i style="margin-right:8px;" class="fa fa-eye "></i> View </a</td>
      </tr>
      <?php } ?>



      </tbody>
      </table>
      <center><div class="dataTables_paginate"><ul class="pagination"><?= $pagination; ?></ul></div></center>




</div>




















<!-- Start = NEWS Model -->
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
<!-- End = NEWS Model -->







<?php include 'footer.php'; ?>
<script>
function delete_function(id){
    var r = confirm("Do you wan't to delete this Subscriber?");
    if (r == true) {
        $.ajax({
            type:"post",
            url: "<?= base_url('Subscribers/delete_db')?>",
            data:{ id:id },
            success:function(data){
                if(data == "success"){ location.reload(); }
                else { alert(data); }
            }
        });
    }    
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
});
</script>
