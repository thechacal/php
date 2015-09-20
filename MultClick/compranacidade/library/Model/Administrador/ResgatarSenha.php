<?php

class Model_Administrador_ResgatarSenha extends Model_RaForm
{

      public function init()
      {

            /**
             * Login
             */
            $login = $this->createElement( 'text', 'login' );
            $login->setLabel( 'Login' );

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
                            $login,
                            $email,
                            $submit,
                                ) );
      }

}