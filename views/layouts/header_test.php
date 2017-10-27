<?php
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

use yii\helpers\Url;
?>
<header class="main-header">

    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?=Url::to(['/site/index'])?>" class="navbar-brand"><b>Foro</b>TSPS</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
                  data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">        
            <li><a href="<?=Url::to(['/search'])?>"><?=Yii::t('app', 'Search')?></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>

          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

        <?php if(Yii::$app->user->isGuest) {
            echo $this->render('guest-menu.php'); 
        } else {
        	   //echo $this->render('messages-menu.php');
        	   //echo $this->render('notifications-menu.php');        	           	
        	   //echo $this->render('tasks-menu.php');        	
        	   echo $this->render('user-menu.php');
        }	   
        ?>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->        
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  
