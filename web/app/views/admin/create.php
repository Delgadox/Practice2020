<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NewsForm */

$this->title = 'Create News Form';
$this->params['breadcrumbs'][] = ['label' => 'News Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
