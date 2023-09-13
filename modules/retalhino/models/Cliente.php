<?php

namespace app\modules\retalhino\models;

use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id_cliente
 * @property string $nome
 * @property string $cpf
 * @property string|null $email
 * @property string|null $senha
 * @property string|null $sexo
 * @property string|null $reciclado
 *
 * @property Empresa[] $empresas
 * @property Endereco[] $enderecos
 * @property LoginStatus[] $loginStatuses
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cpf'], 'required'],
            [['nome'], 'string', 'max' => 40],
            [['cpf'], 'string', 'max' => 11],
            [['email'], 'string', 'max' => 60],
            [['senha'], 'string', 'max' => 8],
            [['sexo'], 'string', 'max' => 1],
            [['reciclado'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cliente' => 'Id Cliente',
            'nome' => 'Nome',
            'cpf' => 'Cpf',
            'email' => 'Email',
            'senha' => 'Senha',
            'sexo' => 'Sexo',
            'reciclado' => 'Reciclado',
        ];
    }

    /**
     * Gets query for [[Empresas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresas()
    {
        return $this->hasMany(Empresa::class, ['id_cliente' => 'id_cliente']);
    }

    /**
     * Gets query for [[Enderecos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnderecos()
    {
        return $this->hasMany(Endereco::class, ['id_cliente' => 'id_cliente']);
    }

    /**
     * Gets query for [[LoginStatuses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLoginStatuses()
    {
        return $this->hasMany(LoginStatus::class, ['id_cliente' => 'id_cliente']);
    }

    public static function getNome(){
        $droptions = Cliente::find()->orderBy('nome')->all();
        $array = ArrayHelper::map($droptions, 'id_cliente', 'nome');
        return $array;
    }

}
