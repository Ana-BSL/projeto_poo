<?php

namespace app\tests\unit;

use app\modules\retalhino\models\Empresa;
use Codeception\Test\Unit;

class EmpresaTest extends Unit
{
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testValidacaoNome()
    {
        $empresa = new Empresa();
        $empresa->nome = ''; // Deixe o campo "nome" em branco para forçar uma falha na validação
        $this->assertFalse($empresa->validate(['nome']));
    }

    public function testValidacaoCnpj()
    {
        $empresa = new Empresa();
        $empresa->cnpj = ''; // Deixe o campo "cnpj" em branco para forçar uma falha na validação
        $this->assertFalse($empresa->validate(['cnpj']));
    }

}
