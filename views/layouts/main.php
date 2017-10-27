<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
   <meta charset="<?= Yii::$app->charset ?>">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.ico">
    <?= Html::csrfMetaTags() ?>
    
    <title><?= Html::encode(Yii::$app->name) ?></title>

    <?php $this->head() ?>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
</head>
<body class="skin-green-light layout-top-nav">

<?php $this->beginBody() ?>

  <div class="wrapper">
  
     <header class="main-header">
        <?= $this->render('header.php')?>
     </header>
     
     <!-- Content Wrapper. Contains page content -->

     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          
          <p> 
           <?= Breadcrumbs::widget([
               'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
              ]) ?>
              
          </p>
        </section>
 
        <!-- Main content -->
    
        <section class="content container-fluid">

           <?= $content ?>

        </section>
        <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
  
     <footer class="main-footer">
       <div class="container">
         <div class="pull-right hidden-xs">
           <b>Template Tanks to :</b> <a href="https://adminlte.io">Almsaeed Studio</a>
         </div>
         <strong>G. Murrieta &copy; 2017-2018 <a href="https://www.matematicas.uady.mx">FMAT</a>.</strong>
       </div>
       <!-- /.container -->
     </footer>

</div>
<!-- ./wrapper -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>