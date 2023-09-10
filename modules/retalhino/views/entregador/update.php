<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\retalhino\models\Entregador $model */

$this->title = 'Update Entregador: ' . $model->id_entregador;
$this->params['breadcrumbs'][] = ['label' => 'Entregadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_entregador, 'url' => ['view', 'id_entregador' => $model->id_entregador]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entregador-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
