<?php

namespace Unit;

use app\modules\retalhino\models\Cliente;
use Codeception\Test\Unit;

class ClienteTest extends Unit
{
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testValidacaoNome()
    {
        $cliente = new Cliente();
        $cliente->nome = '39'; // Defina um nome inválido (vazio)
        
        // Verifique se o modelo é inválido
        $this->assertFalse($cliente->validate());
    }

    public function testValidacaoCpf()
    {
        $cliente = new Cliente();
        $cliente->cpf = '-12587458139'; // Defina um CPF inválido (vazio)

        // Verifique se o modelo é inválido
        $this->assertFalse($cliente->validate());
    }

}
