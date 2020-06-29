<?php

use app\model\User;
use yii\helpers\Html;

$this->title = 'Подробнее';


$this->registerCssFile("@web/css/site.css", [
    'depends' => [\yii\bootstrap4\BootstrapAsset::className()],
    'media' => 'print',
], 'css-print-theme');
?>

    <div>
    <h1><?= Html::encode($this->title) ?></h1>
        <div class="moreBody">
            <?php
            echo "
                <div class='moreItem'>
                    <h1 class='moreHeader'>","Название:",  $details['name']  ,"</h1>
                    <p class='moreText'>", $details['text'] ,"</p>
                    <p class='moreAuthor'>", "Автор:" , $user['username'], "</p>
                </div>
            ";
            ?>
        </div>
    </div>
