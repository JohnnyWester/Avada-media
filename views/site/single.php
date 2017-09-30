<?php

use yii\helpers\Url;
$this->title = $movies->title;
?>

<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="breadcrumbs">
                <a href="<?= Url::to(['site/index']) ?>">Home</a>
                <a href="<?= Url::to(['site/reviews']) ?>">Movie Review</a>
                <span><?= $movies->title ?></span>
            </div>

            <div class="content">
                <div class="row">
                    <div class="col-md-6">
                        <figure class="movie-poster"><img src="<?= $movies->getImage() ?>" alt="#"></figure>
                    </div>
                    <div class="col-md-6">
                        <h2 class="movie-title"><?= $movies->title ?></h2>
                        <div class="movie-summary">
                            <p><?= $movies->description ?></p>
                        </div>
                        <ul class="movie-meta">
                            <li><strong>Length:</strong> <?= $movies->length ?></li>
                            <li><strong>Premiere:</strong> 22 March 2013 (Ukraine)</li>
                        </ul>

                        <ul class="starring">
                            <li><strong>Directors:</strong> <?= $movies->directors ?></li>
                            <li><strong>Writers:</strong> <?= $movies->writers ?></li>
                            <li><strong>Stars:</strong> <?= $movies->stars ?></li>
                        </ul>
                    </div>
                </div> <!-- .row -->
                <div class="entry-content">
                    <?= $movies->text ?>
                </div>
                <h2 class="text-center video">Wath video</h2>
                <a href="<?= $movies->getMovie() ?>">
                    <video width="900" height="700" controls="controls" poster="/playIcon.png" class="movie">
                            <source src="<?= $movies->getMovie() ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                            <source src="<?= $movies->getMovie() ?>" type='video/ogg; codecs="theora, vorbis"'>
                            <source src="<?= $movies->getMovie() ?>" type='video/webm; codecs="vp8, vorbis"'>
                    </video>
                </a>
            </div>
        </div>
    </div> <!-- .container -->
</main>