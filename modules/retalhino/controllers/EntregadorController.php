<?php

namespace app\modules\retalhino\controllers;

use app\modules\retalhino\models\Entregador;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;

class EntregadorController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        $model = new Entregador();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id_entregador' => $model->id_entregador]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionView($id_entregador)
    {
        $model = $this->findModel($id_entregador);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id_entregador)
    {
        $model = new Entregador();
        $model = $this->findModel($id_entregador);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id_entregador' => $model->id_entregador]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id_entregador)
    {
        $this->findModel($id_entregador)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Entregador::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('A página solicitada não existe.');
    }
}
