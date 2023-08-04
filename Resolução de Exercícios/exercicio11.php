<?php
/*
A função `LongestWord(sen)` recebe o parâmetro `sen` e deve retornar a palavra mais longa na string. 
Se houver duas ou mais palavras com o mesmo comprimento, deve-se retornar a primeira palavra da string
com esse comprimento. A função deve ignorar pontuação e assume que `sen` não estará vazio. 
As palavras também podem conter números, por exemplo, "Hello world123 567".
*/
class LongestWordFinder {
    private $sen;

    public function __construct($sen) {
        $this->sen = $sen;
    }

    public function findLongestWord() {
        $words = preg_split('/\W+/', $this->sen);
        $longestWord = '';

        foreach ($words as $word) {
            if (strlen($word) > strlen($longestWord)) {
                $longestWord = $word;
            }
        }

        return $longestWord;
    }
}

// Encontrar a palavra mais longa na string
$finder = new LongestWordFinder("Hello world123 567");
echo $finder->findLongestWord(); // Saída: "world123"

?>