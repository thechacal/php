<?php

class Model_Oferta_Form extends Model_RaForm
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
             * Parceiro
             */
            $parceiro = $this->createElement( 'select', 'id_parceiro' );
            $parceiro->setLabel( 'Parceiro' )
                      ->setRequired()
                      ->setMultiOptions( $this->getSelect( new Model_Parceiro_Table(), 'nome' ) );
            /**
             * Titulo
             */
            $titulo = $this->createElement( 'textarea', 'titulo' );
            $titulo->setLabel( 'Título' )
                      ->setRequired();
                      
            /**
             * Cor do titulo
             */
            $corTitulo = $this->createElement( 'text', 'cortitulo' );
            $corTitulo->setLabel( 'Cor do Título' )
            		  ->setAttrib('style','width:100px;')
                      ->setRequired();
                      
            /**
             * Descricao
             */
            $descricao = $this->createElement( 'textarea', 'descricao' );
            $descricao->setLabel( 'Descrição' )
                      ->setRequired();

            /**
             * Regras
             */
            $regras = $this->createElement( 'textarea', 'regras' );
            $regras->setLabel( 'Regras' )
                      ->setRequired();
            /**
             * Preco normal
             */
            $precoNormal = $this->createElement( 'text', 'M_preco_normal' );
            $precoNormal->setLabel( 'Valor no Mercado' )
                      ->setRequired()
                      ->setAttrib( 'class', 'Money' );
            /**
             * Preco oferta
             */
            $precoOferta = $this->createElement( 'text', 'M_preco_oferta' );
            $precoOferta->setLabel( 'Valor da oferta' )
                      ->setRequired()
                      ->setAttrib( 'class', 'Money' );
            /**
             * Cupons por pessoa
             */
            $cuponsPorPessoa = $this->createElement( 'text', 'cupons_por_pessoa' );
            $cuponsPorPessoa->setLabel( 'Quantidade de Cupons por pessoa' )
                      ->setRequired()
                      ->setAttrib( 'class', 'Numeric' )
                      ->setDescription( 'Deixe 0 para ilimitados' );
            /**
             * Data inicio
             */
            $dataInicio = $this->createElement( 'text', 'D_data_inicio' );
            $dataInicio->setLabel( 'Data Inicial' )
                      ->setRequired()
                      ->setAttrib( 'class', 'Date' )
                      ->setValue( date( 'd/m/Y \H\s 00:00:00', time() + 60 * 60 * 24 ) );
            /**
             * Data fim
             */
            $dataFim = $this->createElement( 'text', 'D_data_fim' );
            $dataFim->setLabel( 'Data Término' )
                      ->setRequired()
                      ->setValue( date( 'd/m/Y \H\s 00:00:00', time() + 60 * 60 * 24 * 5 ) )
                      ->setAttrib( 'class', 'Date' );
            /**
             * Cupom expira
             */
            $cupomExpira = $this->createElement( 'text', 'D_cupom_expira' );
            $cupomExpira->setLabel( 'Data de expiração do cupom' )
                      ->setRequired()
                      ->setAttrib( 'class', 'Date' )
                      ->setValue( date( 'd/m/Y \H\s 00:00:00', time() + 60 * 60 * 24 * 30 * 3 ) );
            /**
             * Minimo compradores
             */
            $minimo = $this->createElement( 'text', 'minimo_compradores' );
            $minimo->setLabel( 'Mínimo de Compradores' )
                      ->setRequired()
                      ->setAttrib( 'class', 'Numeric' )
                      ->setValue( 10 )
                      ->addValidator( new Zend_Validate_Between( array(
                                      'min' => 1,
                                      'max' => 100000
                                          ) ) )
                      ->setDescription( 'Deve ser um número entre 1 e 100.000' );
            /**
             * Maximo compradores
             */
            $maximo = $this->createElement( 'text', 'maximo_compradores' );
            $maximo->setLabel( 'Máximo de Compradores' )
                      ->setRequired()
                      ->setAttrib( 'class', 'Numeric' )
                      ->setDescription( 'Deixe o valor 0 para ilimitados' )
                      ->setValue( 200 );
            /**
             * Imagens
             */
            $imagens = $this->createElement( 'file', 'imagens' );
            $imagens->setLabel( 'Imagens para a oferta (459 x 375)' )
                      ->addValidator( 'Extension', false, 'jpeg, jpg, png, gif' )
                      ->setAttrib( 'class', 'MultiFile' )
                      ->setRequired();
            /**
             * Imagem do cupom
             */
            $imagemCupom = $this->createElement( 'file', 'imagem_cupom' );
            $imagemCupom->setLabel( 'Imagem do Cupom (195 x 125)' )
                      ->addValidator( 'Extension', false, 'jpeg, jpg, png, gif' )
                      ->setRequired();
            /**
             * Informacoes
             */
            $informacoes = $this->createElement( 'textarea', 'informacoes' );
            $informacoes->setLabel( 'Outras informações' );
            /**
             * Destaques
             */
            $destaques = $this->createElement( 'textarea', 'destaques' );
            $destaques->setLabel( 'Destaques' );
            /**
             * V�deo
             */                      
            $video = $this->createElement( 'text', 'video' );
            $video->setLabel( 'Vídeo do YouTube' )
                      ->setDescription( 'Coloque aqui o endereço do vídeo.' );;
            /**
             * Status
             */
            $status = $this->createElement( 'select', 'status' );
            $status->setLabel( 'Status' )
                      ->setRequired()
                      ->setMultiOptions( array(
                            'Ativo' => 'Ativo',
                            'Inativo' => 'Inativo',
                            'Recomeçar' => 'Recomeçar',
                            'Cancelada' => 'Cancelada'
                                ) );

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
                            $titulo,
                            $corTitulo,
//                            $descricao,
                            $destaques,
                            $regras,
                            $video,
                            $precoNormal,
                            $precoOferta,
                            $dataInicio,
                            $dataFim,
                            $cuponsPorPessoa,
                            $cupomExpira,
                            $cupomExpira,
                            $minimo,
                            $maximo,
                            $parceiro,
//                            $informacoes,
                            $imagens,
                            $imagemCupom,
                            $status,
                            $submit,
                                ) );
      }

}

