<?php
/*
Se listarmos todos os números naturais abaixo de 10 que são múltiplos de 3 ou 5, obtemos 3, 5, 6 e 9. 
A soma desses múltiplos é 23.
Encontre a soma de todos os múltiplos de 3 ou 5 abaixo de 1000.
*/
class MultiplesSum {
    private $limit;

    public function __construct($limit) {
        $this->limit = $limit;
    }

    public function findMultiplesSum() {
        $sum = 0;

        for ($i = 1; $i < $this->limit; $i++) {
            if ($i % 3 == 0 || $i % 5 == 0) {
                $sum += $i;
            }
        }

        return $sum;
    }
}

// Encontre a soma dos múltiplos de 3 ou 5 abaixo de 1000
$multiplesSum = new MultiplesSum(1000);
echo $multiplesSum->findMultiplesSum(); // Saída: 233168

?>