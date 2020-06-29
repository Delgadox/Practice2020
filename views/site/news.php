<?php

use app\model\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Новости';

$this->registerJsFile(
    '@web/js/clamp.js',

    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '@web/js/clamp.min.js',

    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerCssFile("@web/css/site.css", [
    'depends' => [\yii\bootstrap4\BootstrapAsset::className()],
    'media' => 'print',
], 'css-print-theme');
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



<div>
    <h1><?= Html::encode($this->title) ?></h1>


<!--        carousel          -->
<div class="carouselWrap">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?=yii\helpers\Url::to('@web/images/First.jpg')?>" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?=yii\helpers\Url::to('@web/images/Second.jpg')?>" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?=yii\helpers\Url::to('@web/images/Third.jpg')?>" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!--        carousel END     -->

    <hr>
    <div class="newsBlock">
        <?php
        $i = 1;
        foreach ($models as $model) {
            echo "
                <div class='newsItem'>
                   <a href=". Url::toRoute(['site/more', 'id'=> $model['id']]) . "><h1 class='newsHeader'>" . $model['name']  ."</h1></a> 
                    <p class='newsText' id='$i'>". $model['text'] ." </p>
                    <p class='newsAuthor'>","Автор: " , $users[$model['author_id']]['username'] ,"</p>
                    <a href=". Url::toRoute(['site/more', 'id'=> $model['id']]) . " class='newsMore'>Подробнее </a>
                </div>
            ";
            $i++;
        }
        ?>
    </div>
    <div class="paginationWrap">
        <?php
            // display pagination
//            echo LinkPager::widget([
//                'pagination' => $pages,
//            ]);
        echo LinkPager::widget([
            'pagination' => $pages,
            'linkContainerOptions' => ['class' => 'page-item'],
            'linkOptions' => ['class' => 'page-link'],
            'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'page-link']
        ])
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php
$this->registerJs(
    "var i = 1;

    while (i <= 5){
        var text = document.getElementById(i);
        \$clamp(text, {clamp: '5'});
        i++;
        if (i > 5){
            break;
        }
    }",

);
?>

