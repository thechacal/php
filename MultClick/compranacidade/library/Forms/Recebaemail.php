<?php

class Forms_Recebaemail extends Model_RaForm
{

      public function init()
      {
            /**
             * Cidade
             */
            $cidade = new Zend_Form_Element_Select( 'id_cidade' );
            $cidade->setMultiOptions( $this->getSelect( new Model_Cidade_Table(), 'nome' ) )
				   ->setLabel( 'Cidade' );
    			  
            /**
             * Email
             */
            $validateEmail = new Zend_Validate_Db_NoRecordExists( 'usuario', 'email' );
            $validateEmail->setMessages( array(
                  Zend_Validate_Db_NoRecordExists::ERROR_RECORD_FOUND => 'Este email ja existe em nosso site'
                      ) );
            $c1 = new Zend_Form_Element_Text( 'email' );
            $c1->setLabel( 'E-mail' )
                      ->addValidator( 'EmailAddress' )
                      ->addValidator( $validateEmail )
                      ->setDescription( 'ATENÇÃO: Seu e-mail será usado para fazer Login em nosso site' )
                      ->setRequired();
                      
            $submit = new Zend_Form_Element_Button( 'submit' );
            $submit->setAttribs( array(
                  'type' => 'submit',
                  'class' => 'Cadastrar'
                      ) )
                  ->setLabel( 'Cadastrar' );
                      
            /**
             * Form
             */
            $this->addAttribs( array( 'class' => 'Form' ) )
                      ->setMethod( Zend_Form::METHOD_POST )
                      ->setAction( '/newsletter/' )
                      ->addElements( array(
                            $cidade,
                            $c1,
                            $submit,
                                ) );
      }

}