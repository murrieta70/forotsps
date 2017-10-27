<?php

use yii\helpers\Url;
?>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">           
            <li><a href="<?=Url::to(['/user/security/login'])?>">Login</a></li>
            <li><a href="<?=Url::to(['/user/registration/register'])?>">Register</a></li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->