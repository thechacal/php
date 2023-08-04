<?php
/*
A função `BracketCombinations(num)` recebe um número inteiro `num` maior ou igual a zero e deve retornar
a quantidade de combinações válidas que podem ser formadas com `num` pares de parênteses. 
Por exemplo, se o valor de entrada for 3, as combinações possíveis com 3 pares de parênteses são: 
()()(), ()(()), (())(), ((())), e (()()). 
Existem 5 combinações no total quando o valor de entrada é 3, então o programa deve retornar 5.
*/
class BracketCombinations {
    private $num;

    public function __construct($num) {
        $this->num = $num;
    }

    public function calculateCombinations() {
        return $this->calculate($this->num);
    }

    private function calculate($num) {
        // Caso base: se $num for 0, só há uma combinação possível: uma string vazia.
        if ($num == 0) {
            return 1;
        }

        $totalCombinations = 0;

        // Loop para calcular todas as combinações possíveis de pares de parênteses
        for ($i = 0; $i < $num; $i++) {
            // Calcula as combinações da parte esquerda da string
            $leftCombinations = $this->calculate($i);

            // Calcula as combinações da parte direita da string
            $rightCombinations = $this->calculate($num - $i - 1);

            // Multiplica as combinações da parte esquerda pelas combinações da parte direita
            $totalCombinations += $leftCombinations * $rightCombinations;
        }

        return $totalCombinations;
    }
}

// Teste com o valor 3
$num = 3;
$combinations = new BracketCombinations($num);
$result = $combinations->calculateCombinations();
echo "O número de combinações válidas é: " . $result . PHP_EOL;
?>
