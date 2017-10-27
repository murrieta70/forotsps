<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Answer */

$this->title = Yii::t('app', 'Answer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Answers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-create">
      <?= DetailView::widget([
        'model' => $post,
        'attributes' => [
            //'id',
            'user.profile.name',
            'question',
            'description:html',
            'created_at:date',
        ],
    ]) ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
