<?php

class Model_Usuario_ResgatarSenha extends Model_RaForm
{

      public function init()
      {

            /**
             * Cpf
             */
            $cpf = $this->createElement( 'text', 'cpf' );
            $cpf->setLabel( 'CPF' )
                      ->setAttrib( 'class', 'CPF' )
                      ->addValidator( new Model_ValidateCPF() );

            /**
             * Email
             */
            $email = $this->createElement( 'text', 'email' );
            $email->setLabel( 'E-mail' )
                      ->setRequired()
                      ->addValidator( 'EmailAddress' );
                      
            /**
             * Submit
             */
            $submit = $this->createElement( 'button', 'submit' );
            $submit->setAttribs( array(
                            'type' => 'submit',
                            'class' => 'Enviar'
                                ) )
                      ->setLabel( 'Enviar' );

            /**
             * Form
             */
            $this->setAction( '' )
                      ->addAttribs( array( 'class' => 'Form' ) )
                      ->setMethod( Zend_Form::METHOD_POST )
                      ->addElements( array(
                            $cpf,
                            $email,
                            $submit,
                                ) );
      }

}