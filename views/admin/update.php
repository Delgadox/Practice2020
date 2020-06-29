<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NewsForm */

$this->title = 'Изменить новость: ' . $model->name;
?>
<div class="news-form-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
