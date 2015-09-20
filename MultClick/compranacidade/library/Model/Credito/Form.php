<?php

class Model_Credito_Form extends Model_RaForm
{

      public function init()
      {
            /**
             * Valor
             */
            $valor = $this->createElement( 'text', 'M_valor' );
            $valor->setLabel( 'Valor (R$)' )
                  ->setAttrib( 'class', 'Money' )
                  ->setRequired();

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
                            $valor,
                            $submit,
                                ) );
      }

}