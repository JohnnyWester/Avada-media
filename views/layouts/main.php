<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\PublicAsset;
use app\models\Movies;
use app\models\News;
use yii\helpers\Html;
use yii\helpers\Url;

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div id="site-content">
    <header class="site-header">
        <div class="container">
            <a href="<?=Url::to(['site/index']); ?>" id="branding">
                <img src="/public/images/logo.png" alt="" class="logo">
                <div class="logo-copy">
                    <h1 class="site-title">Avada media</h1>
                    <small class="site-description">The most useful sites for business</small>
                </div>
            </a> <!-- #branding -->

            <div class="main-navigation">
                <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                <ul class="menu">
                    <li class="menu-item"><a href="<?=Url::to(['site/index']); ?>">Home</a></li>
                    <li class="menu-item"><a href="<?=Url::to(['site/about']); ?>">About the cinema</a></li>
                    <li class="menu-item"><a href="<?=Url::to(['site/reviews']); ?>">Movie reviews</a></li>
                    <li class="menu-item"><a href="<?=Url::to(['/admin']); ?>">Secret place</a></li>
                </ul> <!-- .menu -->
            </div> <!-- .main-navigation -->

            <div class="mobile-navigation"></div>
        </div>
    </header>

        <?= $content ?>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="widget">
                        <h3 class="widget-title">About us</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia tempore vitae mollitia nesciunt saepe cupiditate</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="widget">
                        <h3 class="widget-title">About the cinema</h3>
                        <ul class="no-bullet">
                            <?php $news = News::find()->orderBy('id desc')->limit(4)->all(); ?>
                            <?php foreach ($news as $item): ?>
                            <li><a href="<?= Url::to(['single-news', 'id' => $item->id]); ?>"><?= $item->title ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="widget">
                        <h3 class="widget-title">Movie reviews</h3>
                        <ul class="no-bullet">
                            <?php $movies = Movies::find()->orderBy('id desc')->limit(4)->all(); ?>
                            <?php foreach ($movies as $movie): ?>
                                <li><a href="<?= Url::to(['single', 'id' => $movie->id]); ?>"><?= $movie->title ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="widget">
                        <h3 class="widget-title">Social Media</h3>
                        <ul class="no-bullet">
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Google+</a></li>
                            <li><a href="#">Pinterest</a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- .row -->

            <div class="colophon">Copyright 2017 Avada media, Developed by Max Marchenko. All rights reserved</div>
        </div> <!-- .container -->

    </footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
