<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>        
<!-- User Account Menu -->
     <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <!-- The user image in the navbar-->
          <?=Html::img(Yii::$app->user->identity->profile->getAvatarUrl(24), [
                      'class' => 'img-rounded',
                      'alt' => Yii::$app->user->identity->username,
          ])?>                                
          <!-- hidden-xs hides the username on small devices so only the image appears. -->
          <span class="hidden-xs"><?=Yii::$app->user->identity->username?></span>
        </a>
        <ul class="dropdown-menu">
          <!-- The user image in the menu -->
          <li class="user-header">
            <?=Html::img(Yii::$app->user->identity->profile->getAvatarUrl(48), [
                        'class' => 'img-rounded',
                        'alt' => Yii::$app->user->identity->username,
            ])?>                  
            <p>
               <?=Yii::$app->user->identity->profile->name?> 
                    
               <small>
                  Member since 
                  <?=date('jS \of F Y', Yii::$app->user->identity->created_at)?>
               </small>
            </p>
          </li>
          <!-- Menu Body -->
          <li class="user-body">
            <div class="row">
                 
               <div class="col-xs-4 text-center">
                  <a href="#">Followers</a>
               </div>
               <div class="col-xs-4 text-center">                    
                  <?= Yii::$app->user->identity->isAdmin ? (
                          Html::a( Yii::t('app', 'Admin'), ['/user/admin/index'])
                      ) : ''  
                  ?>
                  <?= Yii::$app->session->has(\dektrium\user\controllers\AdminController::ORIGINAL_USER_SESSION_KEY) ? ( 
                      Html::beginForm(['/user/admin/switch'], 'post')
                    . Html::submitButton('<span class="glyphicon glyphicon-user"></span> ' . Yii::t('user', 'Back to original user')) 
                    . Html::endForm() ) : '' ?>
               </div>
               <div class="col-xs-4 text-center">
                  <a href="#">Friends</a>
               </div>
            </div>
            <!-- /.row -->

          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
               <a href="<?=Url::to(['/user/settings/profile'])?>" 
                  class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
               <?=Html::a(Yii::t('yii','Logout'),
                         ['/user/security/logout'], 
                         ['data-method' => 'post', 'class'=>'btn btn-default btn-flat']                                      
               )?>
            </div>
          </li>
        </ul>
     </li>
