<?php

use yii\helpers\Html;
$answers = $post->answers;

?>

<div class="row">
   <div class="col-md-6">
     <!-- DIRECT CHAT PRIMARY -->
     <div class="box box-primary direct-chat direct-chat-primary">
       <div class="box-header with-border">
          <h3 class="box-title"><?=$post->question?></h3>

          <div class="box-tools pull-right">
             <span data-toggle="tooltip" 
                    title="<?= count($answers)?> <?=Yii::t('app', 'Comments')?>" 
                    class="badge bg-light-blue"><?= count($answers)?></span>
             <button type="button" class="btn btn-box-tool" data-widget="collapse">
                   <i class="fa fa-minus"></i>
             </button>
             <button type="button" class="btn btn-box-tool" data-toggle="tooltip" 
                  title="Contacts" data-widget="chat-pane-toggle">
                  <i class="fa fa-comments"></i>
             </button>
             <button type="button" class="btn btn-box-tool" data-widget="remove">
                   <i class="fa fa-times"></i>
             </button>
          </div>          
       <!-- ./box-header -->
       </div> 
       <div class="box-body">
         <!-- Conversations are loaded here -->
         <div class="direct-chat-messages">
           <!-- Message. Default to the left -->
           <div class="direct-chat-msg">
             <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-left">
                    <?= $post->user->profile->name?>
                </span>
                <span class="direct-chat-timestamp pull-right">
                    <?= date('j \of F Y \- H:i',  $post->created_at)?>
                </span>
             </div>
             <!-- /.direct-chat-info -->
             <?=Html::img($post->user->profile->getAvatarUrl(48), [
                         'class' => 'direct-chat-img',
                         'alt' => "Message User Image",
                     ])
             ?>  
             <!-- /.direct-chat-img -->
             <div class="direct-chat-text">
                 <?= $post->description?>
             </div>
             <!-- /.direct-chat-text -->
           </div>
           <!-- /.direct-chat-msg --> 
                      
           <!-- Message to the right -->
           <?php foreach ($answers as $answer) { ?> 
           <div class="direct-chat-msg right">
             <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-right">
                   <?= $answer->user->profile->name?>
                </span>
                <span class="direct-chat-timestamp pull-left">
                  <?= date('j \of F Y \- H:i',  $answer->created_at)?>
                </span>
             </div>
             <!-- /.direct-chat-info -->
             <?=Html::img($post->user->profile->getAvatarUrl(48), [
                         'class' => 'direct-chat-img',
                         'alt' => "Message User Image",
                     ])
             ?>  
             <!-- /.direct-chat-img -->
             <div class="direct-chat-text">
                <?=str_replace(['<?=', '<?php'] , ['&lt;?=','&lt;?php'], $answer->answer)?>
             </div>
             <!-- /.direct-chat-text -->
           </div>
           <!-- /.direct-chat-msg -->
           <?php } ?>
         </div>
         <!--/.direct-chat-messages-->
         <!-- Contacts are loaded here -->         
       </div>          
       <!-- /.box-body -->
       <div class="box-footer">
          <form action="#" method="post">
             <div class="input-group">
               <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary btn-flat">Send</button>
                  </span>
             </div>
          </form>
       </div>
       <!-- /.box-footer-->
     </div>
     <!-- ./box -->     
   </div>
   <!-- ./col -->       
</div> 
<!-- ./row -->