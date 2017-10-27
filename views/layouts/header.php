<?php
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\helpers\Url;
use yii\helpers\Html;
?>

<?php
  NavBar::begin([
    'brandLabel' => '<b>Foro</b>TSPS',
    'options' => [
                  'class' => 'navbar navbar-static-top',
                  'role' => 'navigation',
                 ],
  ]);

  $menuItems = [
     ['label' => Yii::t('app', 'Search'), 'url'=>['/site']],    
     [
      'label' => Yii::t('app', 'Dropdown'),
      'items' => [
          [
            'label' => Yii::t('app','Level 1 - Dropdown A'),
            'url' => '#'
          ],
          '<li class="divider"></li>',
          '<li class="dropdown-header">Dropdown Header</li>',
          [
             'label' => Yii::t('app','Level 1 - Dropdown B'),
             'url' => '#'
          ]
      ]
     ],         
  ];

  echo Nav::widget([
      'options' => ['class' => 'navbar-nav navbar-left'],
      'items' => $menuItems,
  ]);

?>
  <form class="navbar-form navbar-left" role="search">
     <div class="form-group">
        <input type="text" name="search" class="form-control" placeholder="Buscar">
     </div>     
  </form>
<?php
  
  if(Yii::$app->user->isGuest) {

  echo Nav::widget([
      'options' => ['class' => 'navbar-custom-menu nav navbar-nav'],
      'items' => [
         ['label' => Yii::t('app', 'Sign in'), 'url' => ['/user/security/login']],
         ['label' => Yii::t('app', 'Sign up'), 'url' => ['/user/registration/register']],
      ],   
  ]);

  } else { ?> 
     	    
     <div class="navbar-custom-menu">
       <ul class="nav navbar-nav">
         <?= $this->render('messages-menu.php')?>
         <?= $this->render('user-menu.php')?>
       </ul>
     </div>
     <!-- /.navbar-custom-menu -->        
<?php }
    
  NavBar::end();

?>   

  
