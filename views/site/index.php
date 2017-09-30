<?php

use yii\helpers\Url;
$this->title = 'Home page';
?>

<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="row">
                <?php if($movies == false) {echo "<h1 class='text-center'>Please ask the administrator to upload several movies.</h1>";} ?>
                <div class="col-md-9">
                    <div class="slider">
                        <ul class="slides">
                            <?php foreach ($movies as $movie): ?>
                            <li><a href="<?= Url::to(['site/single', 'id' => $movie->id ]); ?>"><img src="<?= $movie->getImage() ?>" alt="Slide"></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <?php foreach ($last as $item): ?>
                        <div class="col-sm-6 col-md-12">
                            <div class="latest-movie">
                                <a href="<?= Url::to(['site/single', 'id' => $item->id ]); ?>"><img src="<?= $item->getImage() ?>" alt="Movie 1"></a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div> <!-- .row -->

            <div class="row">
                <?php foreach ($latest as $item): ?>
                <div class="col-sm-6 col-md-3">
                    <div class="latest-movie">
                        <a href="<?= Url::to(['site/single', 'id' => $item->id ]); ?>"><img src="<?= $item->getImage() ?>" alt="Movie 3"></a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div> <!-- .row -->
        </div>
    </div> <!-- .container -->
</main>