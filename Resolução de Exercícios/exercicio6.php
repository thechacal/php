<?php
/*
A função `FindIntersection(strArr)` recebe um array de strings chamado `strArr`, que conterá 2 elementos: 
o primeiro elemento representa uma lista de números separados por vírgula, ordenados em ordem crescente; 
o segundo elemento representa outra lista de números separados por vírgula, também ordenados. 
O objetivo é retornar uma string contendo os números que ocorrem em ambos os elementos de `strArr`, 
em ordem crescente e separados por vírgula. Se não houver interseção, a função deve retornar a string "false".
*/
class IntersectionFinder {
    private $strArr;

    public function __construct($strArr) {
        $this->strArr = $strArr;
    }

    public function findIntersection() {
        $list1 = explode(',', $this->strArr[0]);
        $list2 = explode(',', $this->strArr[1]);

        $intersection = array_intersect($list1, $list2);
        sort($intersection);

        return count($intersection) > 0 ? implode(',', $intersection) : "false";
    }
}

// Teste com exemplo ["1, 3, 4, 7, 13", "1, 2, 4, 13, 15"]
$finder1 = new IntersectionFinder(["1, 3, 4, 7, 13", "1, 2, 4, 13, 15"]);
echo $finder1->findIntersection(); // Saída: "1,4,13"

// Teste com exemplo ["1, 2, 4, 5, 6", "3, 7, 8, 9, 10"]
$finder2 = new IntersectionFinder(["1, 2, 4, 5, 6", "3, 7, 8, 9, 10"]);
echo $finder2->findIntersection(); // Saída: "false"

?>