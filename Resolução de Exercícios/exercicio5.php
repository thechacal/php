<?php
/*
A função `CodelandUsernameValidation(str)` recebe o parâmetro `str` e deve determinar se a string
é um nome de usuário válido de acordo com as seguintes regras:

1. O nome de usuário deve ter entre 4 e 25 caracteres.
2. Deve começar com uma letra.
3. Pode conter apenas letras, números e o caractere de sublinhado (underscore).
4. Não pode terminar com um caractere de sublinhado.

Se o nome de usuário for válido, o programa deve retornar a string "true", caso contrário, 
deve retornar a string "false".
*/

class UsernameValidator {
    private $str;

    public function __construct($str) {
        $this->str = $str;
    }

    public function isValidUsername() {
        // Verifica se o tamanho do nome de usuário está dentro do intervalo permitido
        $length = strlen($this->str);
        if ($length < 4 || $length > 25) {
            return false;
        }

        // Verifica se o nome de usuário começa com uma letra
        if (!preg_match('/^[a-zA-Z]/', $this->str)) {
            return false;
        }

        // Verifica se o nome de usuário contém apenas letras, números e sublinhados
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $this->str)) {
            return false;
        }

        // Verifica se o nome de usuário termina com uma letra ou número, e não com um sublinhado
        $lastChar = $this->str[$length - 1];
        if (!ctype_alnum($lastChar) || $lastChar === '_') {
            return false;
        }

        return true;
    }
}

// Teste com exemplos
$validator1 = new UsernameValidator("username123");
echo $validator1->isValidUsername() ? "true" : "false"; // Saída: true

$validator2 = new UsernameValidator("_invalid");
echo $validator2->isValidUsername() ? "true" : "false"; // Saída: false

$validator3 = new UsernameValidator("user_name_");
echo $validator3->isValidUsername() ? "true" : "false"; // Saída: false

?>