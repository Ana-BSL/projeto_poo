<?php

namespace app\tests\unit;

use app\modules\retalhino\models\Entregador;
use Codeception\Test\Unit;

class EntregadorTest extends Unit
{
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testValidacaoNome()
    {
        $entregador = new Entregador();
        $entregador->nome = ''; // Deixe o campo "nome" em branco para forçar uma falha na validação
        $this->assertFalse($entregador->validate(['nome']));
    }

    public function testValidacaoCpf()
    {
        $entregador = new Entregador();
        $entregador->cpf = ''; // Deixe o campo "cpf" em branco para forçar uma falha na validação
        $this->assertFalse($entregador->validate(['cpf']));
    }

}
