/*
Exercício 1
Uma empresa comercial possui um programa para controle das receitas e despesas em seus 10 projetos. 
Os projetos são numerados de 0 até 9. 
Faça um programa C que controle a entrada e saída de recursos dos projetos. 
O programa deverá ler um conjunto de informações contendo: 
Número do projeto, valor, tipo despesa ("R" - Receita e "D" - Despesa). 
O programa termina quando o valor do código do projeto for igual a -1. 
Sabe-se que Receita deve ser somada ao saldo do projeto e despesa subtraída do saldo do projeto. 
Ao final do programa, imprirmir o saldo final de cada projeto.

Dica: Usar uma estrutura do tipo vetor para controlar os saldos dos projetos. 
Usar o conceito de struct para agrupar as informações lidas.
*/
<?php

// Definindo a classe Projeto para agrupar as informações do projeto
class Projeto
{
    public $numero;
    public $saldo;

    public function __construct($num)
    {
        $this->numero = $num;
        $this->saldo = 0;
    }

    public function atualizarSaldo($valor, $tipoDespesa)
    {
        if ($tipoDespesa == 'R' || $tipoDespesa == 'r') {
            $this->saldo += $valor;
        } elseif ($tipoDespesa == 'D' || $tipoDespesa == 'd') {
            $this->saldo -= $valor;
        } else {
            echo "Tipo de despesa inválido! Use 'R' para Receita ou 'D' para Despesa.<br>";
        }
    }
}

const NUM_PROJETOS = 10;

// Criando um array para armazenar os objetos Projeto
$projetos = array();

// Inicializando o array de projetos com objetos Projeto
for ($i = 0; $i < NUM_PROJETOS; $i++) {
    $projetos[] = new Projeto($i);
}

// Loop para ler as informações até que o número do projeto seja -1
while (true) {
    echo "Digite o número do projeto (-1 para encerrar): ";
    $numeroProjeto = intval(trim(fgets(STDIN)));

    if ($numeroProjeto == -1) {
        break; // Encerra o loop caso seja digitado -1
    }

    echo "Digite o valor: ";
    $valor = floatval(trim(fgets(STDIN)));

    echo "Digite o tipo de despesa (R - Receita, D - Despesa): ";
    $tipoDespesa = strtoupper(trim(fgets(STDIN)));

    if ($numeroProjeto >= 0 && $numeroProjeto < NUM_PROJETOS) {
        $projetos[$numeroProjeto]->atualizarSaldo($valor, $tipoDespesa);
    } else {
        echo "Projeto não encontrado!<br>";
    }
}

// Imprimindo o saldo final de cada projeto
echo "<br>Saldo final de cada projeto:<br>";
foreach ($projetos as $projeto) {
    echo "Projeto " . $projeto->numero . ": R$ " . $projeto->saldo . "<br>";
}
