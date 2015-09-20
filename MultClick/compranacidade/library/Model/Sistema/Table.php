<?php

class Model_Sistema_Table extends Model_Tabela
{
      protected $_name = 'sistema';
      protected $_primary = 'nome_site';

      public function init()
      {
            
      }

      public function getNomeSite()
      {
            $sistema = $this->select()->from( 'sistema', 'nome_site' )->query()->fetch();

            return $sistema['nome_site'];
      }

}