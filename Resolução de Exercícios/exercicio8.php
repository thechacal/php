<?php
/*
A função `FirstReverse(str)` recebe o parâmetro `str` e deve retornar a string em ordem reversa. 
Por exemplo, se a string de entrada for "Hello World and Coders", o programa deve retornar a 
string "sredoC dna dlroW olleH".
*/
class Reverser {
    private $str;

    public function __construct($str) {
        $this->str = $str;
    }

    public function reverseString() {
        return strrev($this->str);
    }
}

// Teste com exemplo "Hello World and Coders"
$reverser = new Reverser("Hello World and Coders");
echo $reverser->reverseString(); // Saída: "sredoC dna dlroW olleH"

?>