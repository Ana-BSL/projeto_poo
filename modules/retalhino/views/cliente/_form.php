<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\retalhino\models\Cliente $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cpf')->textInput(['maxlength' => true, 'minlength' => 11, 'pattern' => '^[1-9]*$']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'senha')->textInput(['maxlength' => true, 'minlength' => 8]) ?>

    <?= $form->field($model, 'sexo')->dropDownList([
        'f' => 'Feminino',
        'm' => 'Masculino',
        'o' => 'Outros',
        ]) ?>

    <?= $form->field($model, 'reciclado')->dropDownList([
        'seda' => "Seda",
        "linho" => "Linho",
        "posliester" => "Posliester",
        "viscose" => "Viscose",
        "algodao" => "Algodão",
        ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
