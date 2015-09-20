<?php

class Model_Translate extends Zend_Controller_Plugin_Abstract
{

      public function preDispatch( Zend_Controller_Request_Abstract $request )
      {
            if ( strtolower( $request->getModuleName() ) == 'sistema' )
            {
                  $translateValidators = array(
                        Zend_Validate_Digits::NOT_DIGITS => 'São permitidos apenas números',
                        Zend_Validate_Db_NoRecordExists::ERROR_RECORD_FOUND => 'O registro "%value%" já existe',
                        Zend_Validate_File_Extension::FALSE_EXTENSION => 'As extensões permitidas são: jpeg, jpg, gif e png',
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Este campo é obrigatório',
                        Zend_Validate_StringLength::TOO_SHORT => 'O campo deve conter no mínimo %min% caracteres',
                        Zend_Validate_StringLength::TOO_LONG => 'O campo deve conter no máximo %max% caracteres',
                        Zend_Validate_File_Upload::NO_FILE => 'Nenhum arquivo selecionado',
                        Zend_Validate_EmailAddress::INVALID_FORMAT => 'Endereço de e-mail inválido',
                        Zend_Validate_EmailAddress::INVALID_HOSTNAME => "'%hostname%' não é um host de email válido para o endereço '%value%'",
                  );

                  $translator = new Zend_Translate( 'array', $translateValidators );
                  Zend_Validate_Abstract::setDefaultTranslator( $translator );
            }
            else
            {
                  $translateValidators = array(
                        Zend_Validate_Digits::NOT_DIGITS => 'São permitidos apenas números',
                        Zend_Validate_File_Extension::FALSE_EXTENSION => 'As extensões permitidas são: jpeg, jpg, gif e png',
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Este campo é obrigatório',
                        Zend_Validate_StringLength::TOO_SHORT => 'O campo deve conter no mínimo %min% caracteres',
                        Zend_Validate_StringLength::TOO_LONG => 'O campo deve conter no máximo %max% caracteres',
                        Zend_Validate_File_Upload::NO_FILE => 'Nenhum arquivo selecionado',
                        Zend_Validate_EmailAddress::INVALID_FORMAT => 'Endereço de e-mail inválido',
                        Zend_Validate_EmailAddress::INVALID_HOSTNAME => "'%hostname%' não é um host de email válido para o endereço '%value%'",
                  );

                  $translator = new Zend_Translate( 'array', $translateValidators );
                  Zend_Validate_Abstract::setDefaultTranslator( $translator );
            }
      }

}