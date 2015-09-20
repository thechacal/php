<?php

class Model_Util
{

      /**
       * Transforma string para formato de dinheiro.
       * 
       * Deve ser uma string no formato DECIMAL 10,2 com ponto como separador.
       * @example 20000.39 se tornará 20.000,39
       *
       * Se for um número que não seja acima de mil, será adicionada a virgula do dinheiro.
       * @example 750.50
       *
       * @param String $string
       * @return A string formatada
       */
      public static function stringToMoney( $string, $virgula = true )
      {
            $string = explode( '.', $string );

            $valor = $string[0];
            $cents = ',' . $string[1];
            $retorno = '';

            if ( strlen( $valor ) > 3 )
            {
                  $reverso = strrev( $valor );

                  $new = '';
                  for ( $i = 0; $i < strlen( $reverso ); $i++ )
                  {
                        if ( $i == 0 )
                              $new .= $reverso[0];
                        else
                        {
                              if ( $i % 3 == 0 )
                                    $new .= '.' . $reverso[$i];
                              else
                                    $new .= $reverso[$i];
                        }
                  }

                  $retorno = strrev( $new );
            }
            else
                  $retorno = $valor;

			if($virgula){
				
				$cent = explode(',',$cents);
				$cent = ','.str_pad($cent[1], 2 , "0");
				
				return $retorno . $cent;
			} else {
				return $retorno;
			}
      }

      /**
       * Verifica se o usuario atual eh admin
       * @return bool
       */
      public static function isAdmin()
      {
            return (bool) Zend_Auth::getInstance()->getStorage()->read()->is_admin;
      }

      public static function stopRender()
      {
            die;
      }

      /**
       * Fun��o unique() para arrays  
       *
       */
      public static function super_unique($array)
		{
		  $result = array_map("unserialize", array_unique(array_map("serialize", $array)));
		
		  foreach ($result as $key => $value)
		  {
		    if ( is_array($value) )
		    {
		      $result[$key] = Model_Util::super_unique($value);
		    }
		  }
		
		  return $result;
		}
      
}
