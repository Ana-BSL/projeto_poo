<?php

namespace app\modules\retalhino\models;

use Yii;

/**
 * This is the model class for table "login_status".
 *
 * @property int $id_empresa
 * @property int $id_entregador
 * @property int $id_cliente
 * @property int $id_login
 * @property bool $conectado
 * @property string|null $horario_conexao
 * @property string|null $horario_saida
 *
 * @property Cliente $cliente
 * @property Empresa $empresa
 * @property Entregador $entregador
 */
class LoginStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'login_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_empresa', 'id_entregador', 'id_cliente', 'conectado'], 'required'],
            [['id_empresa', 'id_entregador', 'id_cliente'], 'default', 'value' => null],
            [['id_empresa', 'id_entregador', 'id_cliente'], 'integer'],
            [['conectado'], 'boolean'],
            [['horario_conexao', 'horario_saida'], 'safe'],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::class, 'targetAttribute' => ['id_cliente' => 'id_cliente']],
            [['id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::class, 'targetAttribute' => ['id_empresa' => 'id_empresa']],
            [['id_entregador'], 'exist', 'skipOnError' => true, 'targetClass' => Entregador::class, 'targetAttribute' => ['id_entregador' => 'id_entregador']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_empresa' => 'Id Empresa',
            'id_entregador' => 'Id Entregador',
            'id_cliente' => 'Id Cliente',
            'id_login' => 'Id Login',
            'conectado' => 'Conectado',
            'horario_conexao' => 'Horario Conexao',
            'horario_saida' => 'Horario Saida',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::class, ['id_cliente' => 'id_cliente']);
    }

    /**
     * Gets query for [[Empresa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresa::class, ['id_empresa' => 'id_empresa']);
    }

    /**
     * Gets query for [[Entregador]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntregador()
    {
        return $this->hasOne(Entregador::class, ['id_entregador' => 'id_entregador']);
    }
}
