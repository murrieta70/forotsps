<?php
$post = app\models\Post::findOne(2);


use yii\helpers\Html;

    	     $answertoken = new app\models\Answertoken;
    	     $answertoken->post_id = $post->id;
    	     $answertoken->user_id = $post->user_id;
    	     $answertoken->token   = Yii::$app->security->generateRandomString();

?>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
  </head>
  <body text="#000000" bgcolor="#FFFFFF">
    <div>
      <div style="width:100%;max-width:650px">
        <div style="font-family:Arial">
          <table style="border-collapse:collapse;border-left:1px solid
            #e4e4e4;border-right:1px solid #e4e4e4">
            <tbody>
              <tr>
                <td
                  style="background-color:#f8f8f8;padding-left:18px;border-bottom:1px
                  solid #e4e4e4;border-top:1px solid #e4e4e4"><br>
                </td>
                <td style="padding:13px 10px 8px
                  0px;background-color:#f8f8f8;border-top:1px solid
                  #e4e4e4;border-bottom:1px solid #e4e4e4"
                  valign="middle"> <a
                    style="text-decoration:none"> 
                    <img src="https://www.google.com/intl/es_mx/alerts/logo.png?cd=KhMzNjgxOTQ2MDc1NjU0MzgxNDkw"
                      alt="TSPS" border="0" height="25"> </a>
                </td>
                <td
                  style="background-color:#f8f8f8;padding-left:18px;border-top:1px
                  solid #e4e4e4;border-bottom:1px solid #e4e4e4"><br>
                </td>
              </tr>
              <tr>
                <td style="padding-left:32px"><br>
                </td>
                <td style="padding:18px 0px 0px
                  0px;vertical-align:middle;line-height:20px;font-family:Arial">
                  <span style="color:#262626;font-size:22px">
                     <?= $post->question?>
                  </span>
                  <div style="vertical-align:top;padding-top:6px;color:#aaa;font-size:12px;line-height:16px">
                    <span>
                       <?= $post->user->profile->name?>
                    </span> 
                    <span
                      style="padding:0px 4px 0px 4px">
                    </span> 
                      <a style="color:#aaa;text-decoration:none">
                        <?= Yii::t('app', 'Posted') .': '. date('j \of F Y \- H:i',$post->created_at)?>
                      </a> 
                  </div>
                </td>
                <td style="padding-left:32px"><br>
                </td>
              </tr>
              <tr>
                <td style="padding-left:18px"><br>
                </td>
                <td style="padding-right:18px"><br>
                </td>
              </tr>
              <tr itemscope="" itemtype="http://schema.org/Article">
                <td style="padding-left:18px"><br>
                </td>
                <td style="padding:18px 0px 12px
                  0px;vertical-align:top;font-family:Arial">
                  <div> 
                  
                    <div>
                      <div style="padding:2px 0px 8px 0px">                        
                        <div itemprop="description"
                          style="color:#252525;padding:2px 0px 0px
                          0px;font-size:12px;line-height:18px">
                           <?= $post->description?>
                          </div>
                      </div>
                    </div>
                  </div>
                </td>
                <td style="padding-right:18px"><br>
                </td>
              </tr>
              <tr>
                <td colspan="3" style="background-color:#f8f8f8;font-size:14px;vertical-align:middle;text-align:center;padding:10px
                  10px 10px 10px;line-height:20px;border:1px solid
                  #e4e4e4;font-family:Arial" valign="middle">
                  
                 <a href="<?=Yii::$app->params['urlSite'].$answertoken->urlCommentPost?>" 
                     style='text-decoration:none; vertical-align:middle; color:#427fed'>
                     <?=Yii::t('app', 'You must be the first to respond')?>
                 </a>                  

                </td>
              </tr>
            </tbody>
          </table>
          <table style="padding-top:6px;font-size:12px;color:#252525;text-align:center;width:100%">
            <tbody>
              <tr>
                <td style="font-family:Arial"> Recibiste este correo
                  electrónico porque te suscribiste al <b>FORO de TSPS</b>.
                  <div> <a

                      style="text-decoration:none;color:#427fed">Anular
                      la suscripción</a> <span style="padding:0px 4px
                      0px 4px;color:#252525">|</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td style="padding:6px 10px 0px 0px;font-family:Arial">
                  </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!--[if mso]>
</td></tr></table>
<![endif]--> </div>
  </body>
</html>
