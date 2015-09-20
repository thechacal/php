<?php

class Model_Cidade_Form extends Model_RaForm
{

      public function init()
      {
            /**
             * Nome
             */
            $nome = $this->createElement( 'text', 'nome' );
            $nome->setLabel( 'Nome' )
                      ->setRequired()
                      ->addValidator( new Zend_Validate_Db_NoRecordExists( 'cidade', 'nome' ) );

            /**
             * Submit
             */
            $submit = $this->createElement( 'button', 'submit' );
            $submit->setAttribs( array(
                            'type' => 'submit',
                            'class' => 'Cadastrar'
                                ) )
                      ->setLabel( 'Cadastrar' );

            /**
             * Form
             */
            $this->setAction( '' )
                      ->addAttribs( array( 'class' => 'Form' ) )
                      ->setMethod( Zend_Form::METHOD_POST )
                      ->addElements( array(
                            $nome,
                            $submit,
                                ) );
      }

}