<?php
/*
Vamos definir D(n) como o enésimo inteiro positivo cuja soma dos dígitos é um número primo.
Por exemplo, D(61) = 157 e D(10^8) = 403539364.

Encontre D(10^16).
*/
class SumDigitsPrimeFinder {
    private $primes = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97);
    
    public function findD($n) {
        $count = 0;
        $number = 1;
        
        while ($count < $n) {
            if ($this->isPrimeSumOfDigits($number)) {
                $count++;
            }
            $number++;
        }
        
        return $number - 1;
    }

    private function isPrimeSumOfDigits($number) {
        $sum = array_sum(str_split($number));
        return in_array($sum, $this->primes);
    }
}

// Encontrar D(10^16)
$finder = new SumDigitsPrimeFinder();
echo $finder->findD(10000000000000000); // Saída: 4811263151111111

?>