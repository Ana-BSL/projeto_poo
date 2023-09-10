<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\retalhino\models\Empresa $model */

$this->title = $model->id_empresa;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="empresa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_empresa' => $model->id_empresa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_empresa' => $model->id_empresa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_entregador',
            'id_cliente',
            'nome',
            'cnpj',
            'email:email',
            'senha',
            'raio_abragencia',
            'id_empresa',
        ],
    ]) ?>

</div>
