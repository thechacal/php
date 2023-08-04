<?php
/*
A função `FirstFactorial(num)` recebe o parâmetro `num` e deve retornar o fatorial dele. 
Por exemplo: se `num` for igual a 4, o programa deve retornar (4 * 3 * 2 * 1) = 24. 
Para os casos de teste, o intervalo de valores de `num` estará entre 1 e 18, e a entrada será
sempre um número inteiro.
*/
class FirstFactorial {
    private $num;

    public function __construct($num) {
        $this->num = $num;
    }

    public function calculateFactorial() {
        if ($this->num < 0) {
            return "O fatorial não está definido para números negativos.";
        }

        $factorial = 1;
        for ($i = 1; $i <= $this->num; $i++) {
            $factorial *= $i;
        }

        return $factorial;
    }
}

// Calcular o fatorial do número 4
$firstFactorial = new FirstFactorial(4);
echo $firstFactorial->calculateFactorial(); // Saída: 24

?>