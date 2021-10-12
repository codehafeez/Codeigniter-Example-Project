<?php include 'header.php'; ?>
<?php include 'side-menu.php'; ?>
<div style="padding:50px; padding-left:6%;  padding-right:6%">
<!-- start -->






<form enctype="multipart/form-data" id="update_news_submitForm" class="form-horizontal">
<div style="padding-left:30px; padding-right:30px;">

    <p style="margin-bottom:30px; margin-top:10px; text-align:center; font-size:24px; font-weight:bold">Edit noticia</p>
    <div class="row">
        <div class="col-md-8">
            <input name="id" type="hidden" value="<?=$news[0]['news_id']?>" required>
            <input name="input_value1" value="<?=$news[0]['news_value1']?>" type="text" placeholder="Heading Title" class="form-control" required>
            <input name="input_value2" value="<?=$news[0]['news_value2']?>" style="margin-top:20px;" placeholder="Sub Heading Title" type="text" class="form-control" required>

            <select style="margin-top:20px;" class="form-control" required name="input_value3" value="<?=$news[0]['news_value3']?>">
                <option value="">Select Category</option>
              <?php foreach($categories as $category) { 

                    if($category['category_id'] == $news[0]['news_value3']){ ?>

                            <option selected="selected" value="<?=$category['category_id']?>"><?=$category['category_name']?></option>

                    <?php }
                    else { ?>

                            <option value="<?=$category['category_id']?>"><?=$category['category_name']?></option>

                    <?php }

            } ?>
            </select>

        </div>
        <div class="col-md-4">
                <form id="form1" runat="server">
                <label for="imgInp">
                <img id="blah" style="width:100%; height:170px;" src="<?=base_url('uploads/'.$news[0]['news_img'])?>"/>
                </label>
                <input style="display:none" type='file' name="file" id="imgInp" accept="image/x-png,image/gif,image/jpeg"/>
                </form>
        </div>
    </div>
    <p style="font-size:16px; font-weight:bold">Noticia:</p>
        <textarea name="news_txt" class="content"><?=$news[0]['news_txt']?></textarea>

<center>
<a href="<?=base_url('/')?>" style="margin-top:20px; background:#000; padding:7px; padding-left:20px; padding-right:20px; border-radius:10px; color:#fff;">Back to List</a>
<button type="submit" style="margin-top:20px; background:#000; padding:7px; padding-left:20px; padding-right:20px; border-radius:10px; color:#fff;">Submit Update</button>
</center>

</div>
</form>






<!-- end -->
</div>






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
      $('#update_news_submitForm').submit(function(e){
      e.preventDefault(); 
         $.ajax({
            url: "<?= base_url('News/update_news')?>",
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
