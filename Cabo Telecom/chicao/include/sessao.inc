<?
session_start();
    function auth( 
        $login = '',
        $passwd = ''
    ) {
        global $PHP_SELF, $authdata;
        $check = ! empty( $login );

if ( is_array( $authdata ) ) {

            return true;

        } elseif ( $check ) {


		conectar_banco() or die ("Erro ao acesar o servidor!:(");


	        $autentica=mysql_query("select * from login where login='$login'");
		$var=mysql_fetch_array($autentica);
		$d = $var["id"];
		$l = $var["login"];
		$p = $var["senha"];
		$n = $var["nome"];
		$a = $var["nivel"];

                if ( ($l == $login) && ( $p == md5($passwd) ) ) {


                    session_register( 'authdata' );

                    $authdata = array("login"=>$login, "admin"=>$a, "nome"=>$n, "id"=>$d);

                    return true;

                }


            unset( $authdata );
            return false;

        } else {

            return false;

        }

}
?>
