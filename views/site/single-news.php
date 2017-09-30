<?php

$this->title = $news->title;

?>


<div class="content singleNews">
    <div class="single">
        <div class="single-top">
            <div class="slider">
                <div class="callbacks_container">
                    <ul class="rslides" id="slider4">
                        <li>
                            <img src="<?= $news->getImage() ?>" alt="">

                        </li>
                    </ul>
                </div>
            </div>
            <h2><?= $news->title ?></h2>
            <p class="para"> <?= $news->description ?>
                <span><?= $news->content ?></span> </p>
        </div>
        <div class="single-in">
            <div class="info">
                <h3>Project Info</h3>
                <ul class="likes">
                    <li><i > </i><?= $news->author ?></li>
                    <li><span><i class="dec"> </i><?= $news->getDate() ?></span></li>
                    <li><i class="comment"> </i><?= (int) $news->viewed?></li/>
                </ul>
            </div>
        </div>
        <div class="clear"> </div>
    </div>
</div>