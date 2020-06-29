<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NewsForm */

$this->title = 'Добавить новость';
?>
<div class="news-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
