


<!-- Start = New Model -->
<div class="modal fade" id="new_model" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
<div class="modal-dialog modal-md" role="document">
<form enctype="multipart/form-data" id="add_submitForm" class="form-horizontal">
<div class="modal-content">
<div class="modal-body">

<button type="button" style="font-size:14px; padding:3px; padding-left:5px; padding-right:5px; border-radius:50%; float:left; background:#000; color:#fff;" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>

      <div style="padding-left:30px; padding-right:30px;">
            <p style="margin-top:20px; font-size:18px; text-align:center; font-weight:bold">Creact New Category</p>
            <div class="row">
                  <input style="width:100%" type="text" placeholder="Category Name" name="name" class="form-control-sm">
            </div>
      </div>
</div>
<div class="modal-footer">
<button type="button" class="btn" data-dismiss="modal">Cancel</button>
<button type="submit" class="btn"><i style="margin-right:10px;" class="fa fa-save"></i>Yes Save</button>
</div>
</div>
</form>
</div>
</div>
<!-- End = New Model -->









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
            <p style="margin-top:20px; font-size:18px; text-align:center; font-weight:bold">Do you want to update this category?</p>
            <div class="row">
                  <input type="hidden" name="id" class="id">
                  <input style="width:100%" type="text" placeholder="Category Name" name="name" class="name form-control-sm">
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








<!-- Start = Delete Model -->
<div class="modal fade" id="delete_model" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
<div class="modal-dialog modal-md" role="document">
<form enctype="multipart/form-data" id="delete_submitForm" class="form-horizontal">
<div class="modal-content">
<div class="modal-body">

<button type="button" style="font-size:14px; padding:3px; padding-left:5px; padding-right:5px; border-radius:50%; float:left; background:#000; color:#fff;" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>

      <div style="padding-left:30px; padding-right:30px;">
            <p style="margin-top:20px; font-size:18px; text-align:center; font-weight:bold">Do you want to delete this category?</p>
            <div class="row">
                  <input type="hidden" name="id" class="id">
                  <input style="width:100%" type="text" placeholder="Category Name" name="category_name" class="name form-control-sm">
            </div>
      </div>
</div>
<div class="modal-footer">
<button type="button" class="btn" data-dismiss="modal">Cancel</button>
<button type="submit" class="btn"><i style="margin-right:10px;" class="fa fa-trash-o"></i>Yes Delete</button>
</div>
</div>
</form>
</div>
</div>
<!-- End = Delete Model -->



