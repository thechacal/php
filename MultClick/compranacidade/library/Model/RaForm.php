<?php

class Model_RaForm extends Zend_Form
{

      public function getSelect( Model_Tabela $tbl, $campo )
      {
            $registros = array( );
            foreach ( $tbl->fetchAll()->toArray() as $registro )
            {
                  $registros[$registro[$tbl->getPkName()]] = $registro[$campo];
            }

            return $registros;
      }

      public function getTime( $pattern, $baseTime, $timeLater = 0 )
      {
            return date( $pattern, $baseTime + $timeLater );
      }

}