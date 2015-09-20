<?php

class Model_Usuario_Form extends Model_RaForm
{

      public function init()
      {
            /**
             * Cidade
             */
            $cidade = $this->createElement( 'select', 'id_cidade' );
            $cidade->setLabel( 'Cidade' )
                      ->setRequired()
                      ->setMultiOptions( $this->getSelect( new Model_Cidade_Table(), 'nome' ) );
            /**
             * Nome
             */
            $c1 = $this->createElement( 'text', 'nome' );
            $c1->setLabel( 'Nome Completo' )
                      ->setRequired();
            /**
             * Email
             */
            $c2 = $this->createElement( 'text', 'email' );
            $c2->setLabel( 'E-mail' )
                      ->setRequired()
                      ->addValidator( 'EmailAddress' )
                      ->addValidator( new Zend_Validate_Db_NoRecordExists( 'usuario', 'email' ) );
            /**
             * Cpf
             */
            $c3 = $this->createElement( 'text', 'cpf' );
            $c3->setLabel( 'CPF' )
                      ->setAttrib( 'class', 'CPF' )
                      ->addValidator( new Model_ValidateCPF() )
                      ->addValidator( new Zend_Validate_Db_NoRecordExists( 'usuario', 'cpf' ) );
            /**
             * Newsletter
             */
            $c4 = $this->createElement( 'radio', 'newsletter' );
            $c4->setLabel( 'Cadastrado para receber Newsletter' )
                      ->setRequired()
                      ->setMultiOptions( array(
                            1 => 'Sim',
                            0 => 'Não',
                                ) )
                      ->setAttrib( 'class', 'Radio' )
                      ->setValue(1);
            /**
             * Data Nascimento
             */
            $c5 = $this->createElement( 'text', 'data_nascimento' );
            $c5->setLabel( 'Data de nascimento' )
                      ->setAttrib( 'class', 'DateNascimento' )
                      ->setDescription( 'Formato: dd/mm/aaaa' );
            /**
             * Senha
             */
            $c6 = $this->createElement( 'password', 'senha' );
            $c6->setLabel( 'Senha' )
                      ->setRequired();
            /**
             * Confirma Senha
             */
            $c7 = $this->createElement( 'password', 'confirma_senha' );
            $c7->setLabel( 'Confirme a senha' )
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
                      ->setEnctype( Zend_Form::ENCTYPE_MULTIPART )
                      ->addElements( array(
                            $cidade,
                            $c1,
                            $c2,
                            $c3,
                            $c4,
                            $c5,
                            $c6,
                            $c7,
                            $submit,
                                ) );
      }

}