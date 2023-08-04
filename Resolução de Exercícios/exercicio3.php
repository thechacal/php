<?php
/*
A função `MinWindowSubstring(strArr)` recebe um array de strings `strArr`, que conterá apenas duas strings. 
O primeiro parâmetro será a string N e o segundo parâmetro será uma string K com alguns caracteres. 
O objetivo é determinar a menor substring de N que contenha todos os caracteres em K.

Por exemplo: se `strArr` for ["aaabaaddae", "aed"], 
a menor substring de N que contém os caracteres "a", "e" e "d" é "dae", localizada no final da string. 
Portanto, para este exemplo, o programa deve retornar a string "dae".

Outro exemplo: se `strArr` for ["aabdccdbcacd", "aad"], a menor substring de N que contém todos os caracteres
em K é "aabd", localizada no início da string. 
Ambas as strings terão um comprimento entre 1 e 50 caracteres, e todos os caracteres de K existirão 
em algum lugar da string N. Ambas as strings conterão apenas caracteres alfabéticos minúsculos.
*/
class MinWindowSubstringSolver
{
    private $N;
    private $K;
    
    public function __construct($strArr)
    {
        $this->N = $strArr[0];
        $this->K = $strArr[1];
    }

    public function findMinWindowSubstring()
    {
        $charCount = array();
        $windowStart = 0;
        $windowSize = PHP_INT_MAX;
        $minWindow = "";

        // Inicializa o contador de caracteres com 0
        foreach (str_split($this->K) as $char) {
            if (!isset($charCount[$char])) {
                $charCount[$char] = 0;
            }
        }

        $requiredChars = count($charCount);

        // Inicializa as variáveis de controle do intervalo da janela
        $left = 0;
        $right = 0;
        $formedChars = 0;

        while ($right < strlen($this->N)) {
            $rightChar = $this->N[$right];

            // Se o caractere da direita estiver em K, incrementa seu contador
            if (isset($charCount[$rightChar])) {
                $charCount[$rightChar]++;
                if ($charCount[$rightChar] == 1) {
                    $formedChars++;
                }
            }

            // Reduz o tamanho da janela, movendo a esquerda para a direita até que não seja mais uma janela válida
            while ($formedChars == $requiredChars && $left <= $right) {
                // Atualiza o tamanho da janela se um tamanho menor for encontrado
                $currentWindowSize = $right - $left + 1;
                if ($currentWindowSize < $windowSize) {
                    $windowSize = $currentWindowSize;
                    $windowStart = $left;
                }

                $leftChar = $this->N[$left];

                // Se o caractere da esquerda estiver em K, decrementa seu contador
                if (isset($charCount[$leftChar])) {
                    $charCount[$leftChar]--;
                    if ($charCount[$leftChar] == 0) {
                        $formedChars--;
                    }
                }

                $left++;
            }

            $right++;
        }

        // Verifica se uma janela foi encontrada e retorna a substring correspondente
        if ($windowSize == PHP_INT_MAX) {
            return "";
        } else {
            return substr($this->N, $windowStart, $windowSize);
        }
    }
}

// Teste com o exemplo ["aaabaaddae", "aed"]
$strArr1 = ["aaabaaddae", "aed"];
$solver1 = new MinWindowSubstringSolver($strArr1);
echo $solver1->findMinWindowSubstring(); // Saída: "dae"
?>