<?php
use kartik\helpers\Html;
use kartik\form\ActiveForm;
$answers = $post->answers;
$model= new app\models\Answer;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Submit post'), 
                                  'url' => ['/post/create']];
//$this->params['breadcrumbs'][] = $this->title . ' S: ' .$search;
?>

<div class="row">
   <div class="col-md-12">
      <!-- Box Comment -->
      <div class="box box-widget">
         <div class="box-header with-border">
            <div class="user-block">
                <?=Html::img($post->user->profile->getAvatarUrl(48), [
                         'class' => 'img-rounded',
                         'alt' => $post->user->profile->name,
                     ])
                ?>  
                <span class="username"><a href="#">
                <?= $post->user->profile->name?></a>
                </span>
                <span class="description">Posted - 
                <?= date('j \of F Y \- H:i',  $post->created_at)?></span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
              <?php if (!Yii::$app->user->isGuest) { 
                   if(Yii::$app->user->can('moderator') ) {
              ?> 
                <?= Html::a('', 
                          ['/post/update', 'id' => $post->id], 
                          ['class' => 'fa fa-pencil btn btn-box-tool',
                           'title' => Yii::t('app', 'Update'),
                          ]) 
                ?>
              <?php }} ?>  
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <b><?= $post->question?></b>
              <p>
                 <?=str_replace(['<?=', '<?php'] , ['&lt;?=','&lt;?php'], $post->description)?>
              </p>
              
              <span class="pull-right text-muted"><?= count($answers)?> comments</span>
            </div>
            <!-- /.box-body -->
            <div class="box-footer box-comments">
              <div class="box-comment"> 
              <?php foreach($answers as $answer) { ?>
           
                <!-- User image -->
                <?= Html::img($answer->user->profile->getAvatarUrl(24), 
                    ['class'=>'img-circle img-sm', 'alt'=>'User Image'])
                ?>               
                <div class="comment-text">
                      <span class="username">
                        <?=$answer->user->profile->name?>
                        <span class="text-muted pull-right">
                            <?= date('j \of F Y \- H:i',  $answer->created_at)?>
                        </span>
                      </span><!-- /.username -->
                       
                 <?=str_replace(['<?=', '<?php'] , ['&lt;?=','&lt;?php'], $answer->answer)?>
              
                </div>               
                <!-- /.comment-text -->
                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                <br> 
                <hr>         
            <?php } ?>
              </div>
              <!-- /.box-comment -->
            </div>
            <!-- /.box-footer -->

            <div class="box-footer">
              
            <?php
               $form = ActiveForm::begin([
                        'action'=> ['/answer/create', 'postId'=>$post->id],
                        'fieldConfig'=>['showLabels'=>false], 
                        'options' => ['method'=>'post']]
                        );
                        echo Yii::$app->user->isGuest ? '' : 
                    (
                      Html::img(Yii::$app->user->identity->profile->getAvatarUrl(24), [
                         'class' => 'img-responsive img-circle img-sm',
                         'alt' => Yii::$app->user->identity->username,
                      ])
                    );
                echo '<div class="img-push">';
                echo $form->field($model, 'answer')->textarea(['rows' => 1, 
                                  'placeholder'=>Yii::t('app', 'Your comment')]);
                                echo Html::submitButton(Yii::t('app', 'Send'), 
                                     ['class' => 'btn btn-primary']);
                ActiveForm::end();     
                ?>                                 
                </div>
              </form>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->          
      </div> 
           
      <!-- /.row -->
