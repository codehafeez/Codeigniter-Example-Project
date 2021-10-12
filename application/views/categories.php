<?php include 'header.php'; ?>
<?php include 'side-menu.php'; ?>
<?php include 'categories_models.php'; ?>
<div style="padding:50px; padding-left:6%;  padding-right:6%">






<!-- <form action="<?=base_url('User/filter_cat')?>" method="POST">
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
 -->




</p>
<a data-toggle="modal" data-target="#new_model" style="float:right; background:#000; padding:7px; padding-left:20px; padding-right:20px; border-radius:10px; color:#fff;" href="#">Crear noticia</a>
<div style="clear:both;"></div>






      <table style="margin-top:10px;" id="bootstrap-data-table" class="table table-bordered">
      <tbody>

      <?php foreach($load_categories as $category) { ?>
      <tr>
      <td><?=$category['category_name']?></td>
      <td>
            <div style="float:right;">
            <button data-toggle="modal" data-target="#edit_model" onclick="edit_function(<?= $category['category_id']?>, '<?= $category['category_name']?>')" class="btn"><i class="fa fa-edit "></i></button>
            <button data-toggle="modal" data-target="#delete_model" onclick="delete_function(<?= $category['category_id']?>, '<?= $category['category_name']?>')" class="btn"><i class="fa fa-trash "></i></button>
            </div>
      </td>
      </tr>
      <?php } ?>



      </tbody>
      </table>
      <center><div class="dataTables_paginate"><ul class="pagination"><?= $pagination; ?></ul></div></center>




</div>
<?php include 'footer.php'; ?>
<script>
function edit_function(id, name){
      $(".id").val(id);
      $(".name").val(name);
}

function delete_function(id, name){
      $(".id").val(id);
      $(".name").val(name);
}

$(document).ready(function(){
      $('#add_submitForm').submit(function(e){
      e.preventDefault(); 
         $.ajax({
            url: "<?= base_url('Category/new_category')?>",
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


      $('#update_submitForm').submit(function(e){
      e.preventDefault(); 
         $.ajax({
            url: "<?= base_url('Category/update_category')?>",
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



      $('#delete_submitForm').submit(function(e){
      e.preventDefault(); 
         $.ajax({
            url: "<?= base_url('Category/delete_category')?>",
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

