<?php

namespace app\modules\retalhino\dao;

use Yii;
use Exception;
use app\modules\retalhino\models\Cliente;
use app\modules\retalhino\models\Empresa;
use app\modules\retalhino\models\Entregador;
use app\modules\retalhino\models\LoginStatus;

class LoginStatusDAO
{
    public static function saveData(Empresa $empresa)
    {
        $transaction = Yii::$app->db->beginTransaction();

        try {
            $loginStatus = new LoginStatus();

            $loginStatus->id_empresa = $empresa->id_empresa;
            $loginStatus->id_entregador = $empresa->id_entregador;
            $loginStatus->id_cliente = $empresa->id_cliente;
            $loginStatus->conectado = true; 
            $loginStatus->horario_conexao = date('Y-m-d H:i:s'); 

            if (!$loginStatus->save()) {
                throw new Exception('Erro ao salvar o status de login.');
            }

            $transaction->commit();

            return true;
        } catch (Exception $e) {
            $transaction->rollBack();
            Yii::error($e->getMessage());
            return false;
        }
    }
}
