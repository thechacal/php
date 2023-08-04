<?php
/*
A função `BracketMatcher(str)` recebe a string `str` como parâmetro e deve retornar 1 se os parênteses
estiverem corretamente combinados e cada um estiver devidamente fechado. Caso contrário, deve retornar 0. 
Por exemplo: se `str` for "(hello (world))", o resultado deve ser 1, 
mas se `str` for "((hello (world))", o resultado deve ser 0 porque os parênteses não estão corretamente 
combinados. Apenas os caracteres "(" e ")" serão usados como parênteses. 
Se `str` não contiver parênteses, a função deve retornar 1.
*/

class BracketMatcher {
    private $str;
    private $openCount;

    public function __construct($str) {
        $this->str = $str;
        $this->openCount = 0;
    }

    public function isCorrectlyMatched() {
        for ($i = 0; $i < strlen($this->str); $i++) {
            $char = $this->str[$i];

            if ($char === '(') {
                $this->openCount++;
            } elseif ($char === ')') {
                if ($this->openCount === 0) {
                    return false; // Encontrou um parêntese fechando sem um correspondente aberto
                }
                $this->openCount--;
            }
        }

        // Verifica se todos os parênteses foram corretamente fechados
        return ($this->openCount === 0);
    }
}

// Teste com exemplos
$matcher1 = new BracketMatcher("(hello (world))");
echo $matcher1->isCorrectlyMatched() ? "1" : "0"; // Saída: 1

$matcher2 = new BracketMatcher("((hello (world))");
echo $matcher2->isCorrectlyMatched() ? "1" : "0"; // Saída: 0

$matcher3 = new BracketMatcher("hello world");
echo $matcher3->isCorrectlyMatched() ? "1" : "0"; // Saída: 1 (nenhum parêntese)

?>