<?php include 'header.php'; ?>


<?php include 'side-menu.php'; ?>
<div style="padding:50px; padding-left:6%;  padding-right:6%">
<!-- start -->






        <style>
        th, td{ text-align:center; }
        th { background:#bfbebe; }
        </style>

        <p style="text-align:center; font-size:20px; font-weight:bold;">Anuncios</p>
        <table style="margin-top:10px;" id="bootstrap-data-table" class="table table-bordered">
        <tbody>
            <tr>
            <th> Page </th>
            <th> Ad Number </th>
            <th> Image </th>
            <th> Action </th>
            </tr>


      <?php foreach($ads as $ad) { ?>
      <tr>
      <td><?=$ad['ad_page']?></td>
      <td><?=$ad['ad_title']?></td>
      <td><img style="width:100px;" src="<?=base_url('uploads/'.$ad['ad_image'])?>"/></td>
      <td><button data-toggle="modal" data-target="#edit_model" onclick="edit_function(<?= $ad['ad_id']?>)" class="btn"><i class="fa fa-edit "></i></button>
      </td>
      </tr>
      <?php } ?>


        </tbody>
        </table>


<!-- end -->
</div>








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
            <p style="margin-top:20px; font-size:18px; text-align:center; font-weight:bold">Update ad Image</p>
            <div class="row">
                  <input type="hidden" name="id" class="id">
                  <input type="file" name="file" accept="image/x-png,image/gif,image/jpeg"/ required>
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













<?php include 'footer.php'; ?>
<script>
function edit_function(id){ $(".id").val(id); }
$(document).ready(function(){
      $('#update_submitForm').submit(function(e){
      e.preventDefault(); 
         $.ajax({
            url: "<?= base_url('User/ad_update')?>",
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
