<?php

class Model_Tabela extends Zend_Db_Table_Abstract
{

      public function getTableName()
      {
            return $this->_name;
      }

      public function getPkName()
      {
            if ( is_array( $this->_primary ) )
            {
                  return $this->_primary[1];
            }
            else
            {
                  return $this->_primary;
            }
      }

}