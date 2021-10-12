<aside id="left-panel" class="left-panel">
<nav class="navbar navbar-expand-sm navbar-default">



<div class="navbar-header">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
<i class="fa fa-bars"></i>
</button>
</div>
<div id="main-menu" class="main-menu collapse navbar-collapse">
<ul class="nav navbar-nav">
<center>


    <img style="margin-top:40px; width:220px;" src="<?=base_url('images/logo.png')?>"/>
    <br/>

    <a href="<?=base_url('User/settings')?>">
        <img style="margin-top:40px; border-radius:50%; height:80px; width:80px;" src="<?=base_url('images/profile-picture.png')?>"/>
    </a>
    <br/>


    <style>p.nav_p { line-height: 0; }</style>


<?php if($_SESSION["session_user_type"] == 'admin'){ ?>

            <div style="margin-top:30px; background:#16181a; padding:10px; padding-bottom:20px; padding-top:20px; border-radius:20%;">
            <p class="nav_p">Conectado como:</p>
            <p style="font-size:20px; line-height: 0.9; color:#fff; font-weight:bold"><?=$_SESSION["session_user_name"]?></p>
            <p class="nav_p">Periodista</p>'
            </div>




    <div style="margin-top:30px;">
    <a href="<?=base_url('User/ads')?>"><p style="padding:15px; background:#16181a; font-size:20px; color:#fff; font-weight:bold">Anuncios</p></a>
    </div>

    <div style="margin-top:30px;">
    <a href="<?=base_url('/')?>"><p style="padding:15px; background:#16181a; font-size:20px; color:#fff; font-weight:bold">Noticias</p></a>
    </div>

    <div style="margin-top:30px;">
    <a href="<?=base_url('User/categories')?>"><p style="padding:15px; background:#16181a; font-size:20px; color:#fff; font-weight:bold">Categorias</p></a>
    </div>

        <?php } else { ?>

            <div style="margin-top:30px; background:#16181a; padding:10px; padding-bottom:20px; padding-top:20px; border-radius:20%;">
            <p class="nav_p">Conectado como:</p>
            <p style="font-size:20px; line-height: 0.9; color:#fff; font-weight:bold"><?=$_SESSION["session_user_name"]?></p>
            <p class="nav_p">Operadora</p>'
            </div>

    <div style="margin-top:100px;">
    <a href="<?=base_url('/')?>"><p style="padding:25px; background:#16181a; font-size:20px; color:#fff; font-weight:bold">Programacion radial</p></a>
    </div>
        <?php } ?>




    <p style="border-bottom:1px solid#16181a;"></p>
    
    <p style="font-size:14px; text-align:left; margin-top:40px;">
    &copy;2020 Radio Centro.<br/>
    Reservados todos Ios derechos, Empreas de telecummunicion Radial
    </p>

</center>
</ul>
</div>
</nav>

</aside>
