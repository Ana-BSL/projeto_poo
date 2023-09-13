<?php

namespace app\modules\retalhino\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property int $id_entregador
 * @property int $id_cliente
 * @property string $nome
 * @property string $cnpj
 * @property string|null $email
 * @property string|null $senha
 * @property string|null $raio_abragencia
 * @property int $id_empresa
 *
 * @property Cliente $cliente
 * @property Endereco[] $enderecos
 * @property Entregador $entregador
 * @property LoginStatus[] $loginStatuses
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_entregador', 'id_cliente', 'nome', 'cnpj'], 'required'],
            [['id_entregador', 'id_cliente'], 'default', 'value' => null],
            [['id_entregador', 'id_cliente'], 'integer'],
            [['nome'], 'string', 'max' => 40],
            [['cnpj'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 60],
            [['senha'], 'string', 'max' => 8],
            [['raio_abragencia'], 'string', 'max' => 3],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::class, 'targetAttribute' => ['id_cliente' => 'id_cliente']],
            [['id_entregador'], 'exist', 'skipOnError' => true, 'targetClass' => Entregador::class, 'targetAttribute' => ['id_entregador' => 'id_entregador']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_entregador' => 'Id Entregador',
            'id_cliente' => 'Id Cliente',
            'nome' => 'Nome',
            'cnpj' => 'Cnpj',
            'email' => 'Email',
            'senha' => 'Senha',
            'raio_abragencia' => 'Raio Abragencia',
            'id_empresa' => 'Id Empresa',
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
     * Gets query for [[Enderecos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnderecos()
    {
        return $this->hasMany(Endereco::class, ['id_empresa' => 'id_empresa']);
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

    /**
     * Gets query for [[LoginStatuses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLoginStatuses()
    {
        return $this->hasMany(LoginStatus::class, ['id_empresa' => 'id_empresa']);
    }


}
