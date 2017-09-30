<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <table class="table table-bordered">
        <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($news as $item): ?>
                <tr>
                    <th scope="row"><?= $item->id ?></th>
                    <td><a href="<?= Url::to(['/site/single-news', 'id' => $item->id]) ?>"><?= $item->title ?></a></td>
                    <td><?= $item->description ?></td>
                    <td><?= $item->date ?></td>
                    <td>
                        <a href="<?= Url::to(['view', 'id' => $item->id]) ?>">
                            <i class="glyphicon glyphicon-eye-open"></i>
                        </a>
                        <a href="<?= Url::to(['news/update', 'id' => $item->id]) ?>">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                        <a href="<?= Url::to(['news/delete', 'id' => $item->id]) ?>">
                            <i class="glyphicon glyphicon-remove"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
    if ($news == false) {
        echo "<h3>No one news was not found!</h3>";
    }
    ?>
</div>
