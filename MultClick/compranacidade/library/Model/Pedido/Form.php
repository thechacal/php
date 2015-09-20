<?php

class Model_Pedido_Form extends Model_RaForm
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
                      ->addValidator( 'EmailAddress' );
            /**
             * Empresa
             */
            $c3 = $this->createElement( 'text', 'empresa' );
            $c3->setLabel( 'Empresa' )
                      ->setRequired();
            /**
             * Sobre
             */
            $c4 = $this->createElement( 'textarea', 'sobre' );
            $c4->setLabel( 'Sobre' )
                      ->setRequired();
            /**
             * CNPJ
             */
            $c5 = $this->createElement( 'text', 'cnpj' );
            $c5->setLabel( 'CNPJ' )
                      ->setAttrib( 'class', 'CNPJ' );
            /**
             * Razao Social
             */
            $c6 = $this->createElement( 'text', 'razao_social' );
            $c6->setLabel( 'Razão Social' );
            /**
             * Rua
             */
            $c7 = $this->createElement( 'text', 'rua' );
            $c7->setLabel( 'Rua' );
            /**
             * Numero
             */
            $c8 = $this->createElement( 'text', 'numero' );
            $c8->setLabel( 'Número' )
                      ->setAttrib( 'class', 'Numeric' );
            /**
             * Complemento
             */
            $c9 = $this->createElement( 'text', 'complemento' );
            $c9->setLabel( 'Complemento' );
            /**
             * Cep
             */
            $c10 = $this->createElement( 'text', 'cep' );
            $c10->setLabel( 'Cep' )
                      ->setAttrib( 'class', 'CEP' );
            /**
             * Bairro
             */
            $c11 = $this->createElement( 'text', 'bairro' );
            $c11->setLabel( 'Bairro' );
            /**
             * Celular
             */
            $c12 = $this->createElement( 'text', 'celular' );
            $c12->setLabel( 'Celular' )
                      ->setAttrib( 'class', 'Telefone' );
            /**
             * Bairro
             */
            $c13 = $this->createElement( 'text', 'telefone' );
            $c13->setLabel( 'Telefone' )
                      ->setAttrib( 'class', 'Telefone' );
            /**
             * Site
             */
            $c14 = $this->createElement( 'text', 'site' );
            $c14->setLabel( 'Website' );
            /**
             * Imagens
             */
            $c15 = $this->createElement( 'file', 'imagens' );
            $c15->setLabel( 'Imagens' )
                      ->addValidator( 'Extension', false, 'jpeg, jpg, png, gif' )
                      ->setAttrib( 'class', 'MultiFile' );
            /**
             * Mapa
             */
            $c16 = $this->createElement( 'file', 'mapa' );
            $c16->setLabel( 'Mapa' )
                      ->addValidator( 'Extension', false, 'jpeg, jpg, png, gif' );
            /**
             * Imagens
             */
            $c17 = $this->createElement( 'file', 'logo' );
            $c17->setLabel( 'Logo' )
                      ->addValidator( 'Extension', false, 'jpeg, jpg, png, gif' );
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
                            $c8,
                            $c9,
                            $c10,
                            $c11,
                            $c12,
                            $c13,
                            $c14,
//                            $c15,
                            $c16,
                            $c17,
                            $submit,
                                ) );
      }

}