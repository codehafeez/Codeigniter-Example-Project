<?php include 'header.php'; ?>
<?php include 'side-menu.php'; ?>
<div style="padding:50px; padding-left:6%;  padding-right:6%">
<!-- start -->





<div style="padding-left:30px; padding-right:30px;">

    <p style="margin-top:10px; text-align:center; font-size:24px; font-weight:bold">View Email</p>


        <p style="font-size:16px; font-weight:bold">Username</p>
        <input value="<?=$data[0]['user_name']?>" type="text" placeholder="Category" class="form-control" disabled>

        <p style="margin-top:40px; font-size:16px; font-weight:bold">Email</p>
        <input value="<?=$data[0]['user_email']?>"  style="margin-top:20px;" placeholder="Email" type="text" class="form-control" disabled>


        <p style="margin-top:40px; font-size:16px; font-weight:bold">Message</p>
        <textarea name="news_txt" class="content"><?=$data[0]['send_msg']?></textarea>

</div>






<!-- end -->
</div>






<?php include 'footer.php'; ?>
