<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;
$this->title = 'About the cinema';
?>
<div class="row">
    <div class="col-md-8">
        <?php if ($news == false) {
            echo "<h1 style='text-align: center; color: #fff; margin-left: 20em'>No results found</h1>";
        } ?>
        <?php foreach ($news as $item): ?>
            <article>
                <div class="blog-item-wrap">
                    <div class="post-format">
                        <span><i class="fa fa-eye icon-2x"></i><li><?= (int) $item->viewed?></li/></span>
                    </div>
                    <a href="<?= Url::to(['single-news', 'id' => $item->id]) ?>"><h2 class="blog-title" style="text-transform: uppercase;"><?= $item->title ?></h2></a>
                    <div class="entry-meta" style="text-transform: uppercase;">
                        <span class="meta-part"><i class="ico-user"></i><?= $item->author ?>, </span>
                        <span class="meta-part"><i class="ico-calendar-alt-fill"></i> <?= $item->getDate() ?></span>
                    </div>

                    <div class="feature-inner">
                        <a href="<?= Url::to(['single-news', 'id' => $item->id]) ?>"><img src="<?= $item->getImage() ?>"></div></a>

                    <div class="post-content">
                        <p style="text-align: justify;font-size: 16px;line-height: 1.5;">
                            <?= $item->description ?>
                        </p>
                        <a class="btn btn-common btn-more" href="<?= Url::to(['single-news', 'id' => $item->id]) ?>">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</div>
<div class="pagination">
    <?php echo LinkPager::widget(['pagination' => $pagination,]); ?>
</div>


