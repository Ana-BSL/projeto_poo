<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\retalhino\search\EmpresaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="empresa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_entregador') ?>

    <?= $form->field($model, 'id_cliente') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'cnpj') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'senha') ?>

    <?php // echo $form->field($model, 'raio_abragencia') ?>

    <?php // echo $form->field($model, 'id_empresa') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
