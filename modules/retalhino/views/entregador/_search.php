<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\retalhino\search\EntregadorSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="entregador-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_entregador') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'cpf') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'senha') ?>

    <?php // echo $form->field($model, 'sexo') ?>

    <?php // echo $form->field($model, 'peso_maximo') ?>

    <?php // echo $form->field($model, 'veiculo') ?>

    <?php // echo $form->field($model, 'placa') ?>

    <?php // echo $form->field($model, 'raio_abragencia') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
