<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\retalhino\models\Entregador $model */

$this->title = $model->id_entregador;
$this->params['breadcrumbs'][] = ['label' => 'Entregadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="entregador-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_entregador' => $model->id_entregador], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_entregador' => $model->id_entregador], [
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
            'nome',
            'cpf',
            'email:email',
            'senha',
            'sexo',
            'peso_maximo',
            'veiculo',
            'placa',
            'raio_abragencia',
        ],
    ]) ?>

</div>
