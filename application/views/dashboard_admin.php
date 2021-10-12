<?php include 'header.php'; ?>


<?php include 'side-menu.php'; ?>
<div style="padding:50px; padding-left:6%;  padding-right:6%">
<!-- start -->





<form action="<?=base_url('User/filter')?>" method="POST">
<p style="float:left;">
<span>Filtors</span>
<select name="filter_category" id="SelectLm" class="form-control-sm" onchange="this.form.submit()">
<option value="0">View All Category</option>

<?php foreach($categories as $category) {
    if($category['category_id'] == $selected_category) { ?>

            <option selected="selected" value="<?=$category['category_id']?>"><?=$category['category_name']?></option>

    <?php } else { ?>

            <option value="<?=$category['category_id']?>"><?=$category['category_name']?></option>

    <?php }
} ?>

</select>
</p>
</form>





<a style="float:right; background:#000; padding:7px; padding-left:20px; padding-right:20px; border-radius:10px; color:#fff;" data-toggle="modal" data-target="#add_news_Modal" href="#">Crear noticia</a>






<style>
    .fa-bell{ font-size:30px; }
    .header-left-notification { float:right; margin-right:10px; }
</style>
<?= $notification ?>



<div style="clear:both;"></div>



        
        <style>
        th, td{ text-align:center; }
        th { background:#bfbebe; }
        </style>
        <table style="margin-top:10px;" id="bootstrap-data-table" class="table table-bordered">
        <tbody>

            <tr>
                <th> Title </th>
                <th> Category </th>
                <th> Publsih Datetime </th>
                <th> Image </th>
                <th> Actions </th>
            </tr>

          <?php 
                foreach($news as $data) { 
            ?>
            <tr>
                <td><?=$data['news_value1']?></td>
                <td><?=$data['category_name']?></td>
                <td><?=$data['news_datetime']?></td>
                <td>
                    <center>
                    <img style="width:100px;" src="<?=base_url('uploads/'.$data['news_img'])?>"/>
                    </center>
                </td>
                <td>
                    <div style="float:right;">
                    <a href="<?=base_url('News/edit_news/'.$data['news_id'])?>" class="btn"><i class="fa fa-edit "></i></a>
                    <button onclick="delete_function(<?= $data['news_id']?>)" class="btn"><i class="fa fa-trash "></i></button>
                    </div>
                </td>
            </tr>

          <?php } ?>

        </tbody>
        </table>
        <center><div class="dataTables_paginate"><ul class="pagination"><?= $pagination; ?></ul></div></center>






<!-- end -->
</div>















<!-- Start = NEWS Model -->
<div class="modal fade" id="add_news_Modal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<form enctype="multipart/form-data" id="add_news_submitForm" class="form-horizontal">
<div class="modal-content">
<div class="modal-body">

<button type="button" style="font-size:14px; padding:3px; padding-left:5px; padding-right:5px; border-radius:50%; float:left; background:#000; color:#fff;" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>

    <br/>
    <div style="padding-left:30px; padding-right:30px;">
        <p style="margin-top:20px; font-size:18px; font-weight:bold">Editar noticia</p>
        <div class="row">
            <div class="col-md-8">
                <input name="input_value1" type="text" placeholder="Heading Title" class="form-control" required>
                <input name="input_value2" style="margin-top:20px;" placeholder="Sub Heading Title" type="text" class="form-control" required>

                <select style="margin-top:20px;" class="form-control" required name="input_value3">
                    <option value="">Select Category</option>
                  <?php foreach($categories as $category) { ?>
                    <option value="<?=$category['category_id']?>"><?=$category['category_name']?></option>
                  <?php } ?>
                </select>

            </div>
            <div class="col-md-4">
                    <form id="form1" runat="server">
                    <label for="imgInp">
                    <img id="blah" style="width:100%; height:170px;" src="<?=base_url('images/default-image.jpg')?>"/>
                    </label>
                    <input style="display:none" type='file' name="file" id="imgInp" accept="image/x-png,image/gif,image/jpeg"/>
                    </form>
            </div>
        </div>
        <p style="font-size:16px; font-weight:bold">Noticia:</p>
            <textarea name="news_txt" class="content"></textarea>

    </div>
</div>
    <center style="padding-bottom:20px;">
    <button type="submit" style="background:#000; padding:7px; padding-left:20px; padding-right:20px; border-radius:10px; color:#fff;">Crear noticia</button>
    </center>
</div>
</form>
</div>
</div>
<!-- End = NEWS Model -->








<?php include 'footer.php'; ?>
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) { $('#blah').attr('src', e.target.result); }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imgInp").change(function(){ readURL(this); });




$(document).ready(function(){
      $('#add_news_submitForm').submit(function(e){
      e.preventDefault(); 
         $.ajax({
            url: "<?= base_url('News/add_news')?>",
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



function delete_function(id){
    var r = confirm("Do you wan't to delete this news?");
    if (r == true) {
        $.ajax({
            type:"post",
            url: "<?= base_url('News/delete_news')?>",
            data:{ id:id },
            success:function(data){
                if(data == "success"){ location.reload(); }
                else { alert(data); }
            }
        });
    }    
}

function clearNotification(){
    $.ajax({
        type:"post",
        url: "<?= base_url('User/clear_notification')?>",
        success:function(data){
            if(data == "success"){ location.reload(); }
            else { alert(data); }
        }
    });
}
</script>
