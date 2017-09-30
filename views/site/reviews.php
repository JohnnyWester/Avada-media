<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;
$this->title = 'Movie reviews';
?>

<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="breadcrumbs">
                <a href="<?= Url::to(['site/index']) ?>">Home</a>
                <span>Movies</span>
            </div>
            <div class="movie-list">
                <?php if($movies == false) {echo "<h1 class='text-center'>Please ask the administrator to upload several movies.</h1>";} ?>
                <?php foreach ($movies as $movie): ?>
                <div class="movie">
                    <figure class="movie-poster"><a href="<?= Url::to(['single', 'id' => $movie->id]) ?>"><img src="<?= $movie->getImage() ?>" alt="#"></a></figure>
                    <div class="movie-title"><a href="<?= Url::to(['single', 'id' => $movie->id]) ?>"><?= $movie->title ?></a></div>
                    <div class="post-format">
                        <ul><span><i class="fa fa-eye icon-2x"></i><li><?= (int) $movie->viewed?></li/></span></ul>
                    </div>
                    <p style="margin-top: 20px"><?= mb_strimwidth($movie->description, 0, 70) ?></p>
                </div>
                <?php endforeach; ?>
            </div> <!-- .movie-list -->

            <div class="pagination">
                <?php echo LinkPager::widget(['pagination' => $pagination,]); ?>
            </div>
        </div>
    </div> <!-- .container -->
</main>