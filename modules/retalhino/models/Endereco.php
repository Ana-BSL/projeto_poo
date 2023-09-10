<?php

namespace app\modules\retalhino\models;

use Yii;

/**
 * This is the model class for table "endereco".
 *
 * @property int $id_empresa
 * @property int $id_entregador
 * @property int $id_cliente
 * @property int $id_endereco
 * @property string $logradouro
 * @property int $numero
 * @property string|null $bairro
 * @property string|null $cidade
 * @property string|null $estado
 * @property string|null $pais
 * @property string|null $complemento
 *
 * @property Cliente $cliente
 * @property Empresa $empresa
 * @property Entregador $entregador
 */
class Endereco extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'endereco';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_empresa', 'id_entregador', 'id_cliente', 'logradouro', 'numero'], 'required'],
            [['id_empresa', 'id_entregador', 'id_cliente', 'numero'], 'default', 'value' => null],
            [['id_empresa', 'id_entregador', 'id_cliente', 'numero'], 'integer'],
            [['logradouro'], 'string', 'max' => 30],
            [['bairro'], 'string', 'max' => 20],
            [['cidade', 'pais', 'complemento'], 'string', 'max' => 10],
            [['estado'], 'string', 'max' => 2],
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
            'id_endereco' => 'Id Endereco',
            'logradouro' => 'Logradouro',
            'numero' => 'Numero',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'pais' => 'Pais',
            'complemento' => 'Complemento',
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
