<?php

namespace app\modules\retalhino\controllers;

use Yii;
use app\modules\retalhino\models\Cliente;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ClienteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        $model = new Cliente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id_cliente' => $model->id_cliente]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionView($id_cliente)
    {
        $model = $this->findModel($id_cliente);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id_cliente)
    {
        $model = new Cliente();
        $model = $this->findModel($id_cliente);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id_cliente' => $model->id_cliente]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionDelete($id_cliente)
    {
        $this->findModel($id_cliente)->delete();

        return $this->redirect(['index']);
    }
    protected function findModel($id)
    {
        if (($model = Cliente::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('A página solicitada não existe.');
    }
}
