<?php

class Forms_CadastroUsuario extends Model_RaForm
{

      public function init()
      {
            /**
             * Cidade
             */
            $cidade = new Zend_Form_Element_Select( 'id_cidade' );
            $cidade->setMultiOptions( $this->getSelect( new Model_Cidade_Table(), 'nome' ) )
				   ->setLabel( 'Cidade' )
				   ->setRequired();
    			  
            /**
             * Nome
             */
            $c1 = new Zend_Form_Element_Text( 'nome' );
            $c1->setLabel( 'Nome Completo' )
                      ->setRequired();
                      
            /**
             * Email
             */
            $validateEmail = new Zend_Validate_Db_NoRecordExists( 'usuario', 'email' );
            $validateEmail->setMessages( array(
                  Zend_Validate_Db_NoRecordExists::ERROR_RECORD_FOUND => 'Este email ja existe em nosso site'
                      ) );
            $c2 = new Zend_Form_Element_Text( 'email' );
            $c2->setLabel( 'E-mail' )
                      ->addValidator( 'EmailAddress' )
                      ->addValidator( $validateEmail )
                      ->setDescription( 'ATENÇÃO: Seu e-mail será usado para fazer Login em nosso site' )
                      ->setRequired();
                      
            /**
             * Cpf
             */
            $validateCpf = new Zend_Validate_Db_NoRecordExists( 'usuario', 'cpf' );
            $validateCpf->setMessages( array(
                  Zend_Validate_Db_NoRecordExists::ERROR_RECORD_FOUND => 'Este CPF ja existe em nosso site'
                      ) );
            $c3 = new Zend_Form_Element_Text( 'cpf' );
            $c3->setLabel( 'CPF' )
                      ->setAttrib( 'class', 'CPF' )
                      ->addValidator( new Model_ValidateCPF() )
                      ->addValidator( $validateCpf );
                      
            /**
             * Newsletter
             */
	         $c4= new Zend_Form_Element_Radio('newsletter');
	         $c4->setRequired()
	                  ->setLabel('Deseja receber novidades de nossas ofertas?')
                      ->setMultiOptions( array(
                            1 => 'Sim',
                            0 => 'Não',
                                ) )
                      ->setAttrib( 'class', 'Radio' )
                      ->setValue( 1 );
	                      
            /**
             * Data Nascimento
             */
            $c5 = new Zend_Form_Element_Text( 'data_nascimento' );
            $c5->setLabel( 'Data de nascimento' )
                      ->setAttrib( 'class', 'DateNascimento' )
                      ->setDescription( 'Formato: dd/mm/aaaa' );
            /**
             * Senha
             */

            $c6 = new Zend_Form_Element_Password( 'senha' );
            $c6->setLabel( 'Senha' )
                      ->setRequired()
                      ->addValidator( new Zend_Validate_StringLength( array(
                                      'min' => 6
                                          ) ) )
					  ->setDescription( 'A senha deve ter mais que 6 caracteres' );
                      
            /**
             * Confirma Senha
             */
            $c7 = new Zend_Form_Element_Password( 'confirma_senha' );
            $c7->setLabel( 'Confirme a senha' )
                      ->setRequired()
                      ->addValidator( new Zend_Validate_Identical( 'senha' ) )
					  ->addErrorMessages( array( 'A confirmação de senha é diferente da senha' ) );
                      
            /**
             * Telefone
             */
            $c8 = new Zend_Form_Element_Text( 'telefone' );
            $c8->setLabel( 'Telefone' )
                      ->setRequired()
                      ->setAttrib('class','Telefone');
            /**
             * Submit
             */
                      
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
//                      ->setAction( '/cadastrar/cadastra' )
                      ->addElements( array(
                            $cidade,
                            $c1,
                            $c3,
                            $c4,
                            $c5,
                            $c8,
                            $c2,
                            $c6,
                            $c7,
                            $submit,
                                ) );
      }

}