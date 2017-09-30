<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Movies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movies-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->textInput(["placeholder" => "You can don't fill date field and it will be set today."]) ?>

    <?= $form->field($image, 'image')->fileInput() ?>

    <?= $form->field($model, 'length')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'premiere')->textInput() ?>

    <?= $form->field($model, 'directors')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'writers')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stars')->textInput(['maxlength' => true]) ?>

    <?= $form->field($upload, 'movie')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
