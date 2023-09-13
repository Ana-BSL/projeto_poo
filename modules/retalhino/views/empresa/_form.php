<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\retalhino\models\Empresa $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="empresa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_entregador')->dropDownList(
        \app\modules\retalhino\models\Entregador::getNome(),
    ) ?>

    <?= $form->field($model, 'id_cliente')->dropDownList(
        \app\modules\retalhino\models\Cliente::getNome(),
    ) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cnpj')->textInput(['maxlength' => true, 'minlength' => 15, 'pattern' => '^[1-9]*$']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'senha')->textInput(['maxlength' => true, 'minlength' => 8]) ?>

    <?= $form->field($model, 'raio_abragencia')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>