<?php

namespace app\modules\retalhino\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "entregador".
 *
 * @property int $id_entregador
 * @property string $nome
 * @property string $cpf
 * @property string|null $email
 * @property string|null $senha
 * @property string|null $sexo
 * @property string|null $peso_maximo
 * @property string|null $veiculo
 * @property string|null $placa
 * @property string|null $raio_abragencia
 *
 * @property Empresa[] $empresas
 * @property Endereco[] $enderecos
 * @property LoginStatus[] $loginStatuses
 */
class Entregador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entregador';
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
            [['peso_maximo', 'raio_abragencia'], 'string', 'max' => 3],
            [['veiculo', 'placa'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_entregador' => 'Id Entregador',
            'nome' => 'Nome',
            'cpf' => 'Cpf',
            'email' => 'Email',
            'senha' => 'Senha',
            'sexo' => 'Sexo',
            'peso_maximo' => 'Peso Maximo',
            'veiculo' => 'Veiculo',
            'placa' => 'Placa',
            'raio_abragencia' => 'Raio Abragencia',
        ];
    }

    /**
     * Gets query for [[Empresas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresas()
    {
        return $this->hasMany(Empresa::class, ['id_entregador' => 'id_entregador']);
    }

    /**
     * Gets query for [[Enderecos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnderecos()
    {
        return $this->hasMany(Endereco::class, ['id_entregador' => 'id_entregador']);
    }

    /**
     * Gets query for [[LoginStatuses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLoginStatuses()
    {
        return $this->hasMany(LoginStatus::class, ['id_entregador' => 'id_entregador']);
    }

    public static function getNome(){
        $droptions = Entregador::find()->orderBy('nome')->all();
        $array = ArrayHelper::map($droptions, 'id_entregador', 'nome');
        return $array;
    }
}
