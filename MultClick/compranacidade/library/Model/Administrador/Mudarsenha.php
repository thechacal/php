<?php

class Model_Administrador_Mudarsenha extends Model_RaForm
{

      public function init()
      {
            /**
             * Senha
             */

            $c1 = new Zend_Form_Element_Password( 'senha' );
            $c1->setLabel( 'Senha' )
                      ->setRequired()
                      ->addValidator( new Zend_Validate_StringLength( array(
                                      'min' => 6
                                          ) ) )
					  ->setDescription( 'A senha deve ter mais que 6 caracteres' );
                      
            /**
             * Confirma Senha
             */
            $c2 = new Zend_Form_Element_Password( 'confirma_senha' );
            $c2->setLabel( 'Confirme a senha' )
                      ->setRequired()
                      ->addValidator( new Zend_Validate_Identical( 'senha' ) )
					  ->addErrorMessages( array( 'A confirmação de senha é diferente da senha' ) );
                      
            /**
             * Submit
             */
                      
            $submit = new Zend_Form_Element_Button( 'submit' );
            $submit->setAttribs( array(
                  'type' => 'submit',
                  'class' => 'Cadastrar'
                      ) )
                  ->setLabel( 'Mudar' );
                      
            /**
             * Form
             */
            $this->addAttribs( array( 'class' => 'Form' ) )
                      ->setMethod( Zend_Form::METHOD_POST )
//                      ->setAction( '/cadastrar/cadastra' )
                      ->addElements( array(
                            $c1,
                            $c2,
                            $submit,
                                ) );
      }

}