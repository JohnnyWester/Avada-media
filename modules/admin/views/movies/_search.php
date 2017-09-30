<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MoviesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movies-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'text') ?>

    <?= $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'length') ?>

    <?php // echo $form->field($model, 'premiere') ?>

    <?php // echo $form->field($model, 'directors') ?>

    <?php // echo $form->field($model, 'writers') ?>

    <?php // echo $form->field($model, 'stars') ?>

    <?php // echo $form->field($model, 'movie') ?>

    <?php // echo $form->field($model, 'viewed') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
