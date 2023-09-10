<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\retalhino\models\Empresa $model */

$this->title = 'Update Empresa: ' . $model->id_empresa;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_empresa, 'url' => ['view', 'id_empresa' => $model->id_empresa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="empresa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
