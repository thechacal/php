<?php

class Sistema_ParceiroController extends Model_Modelo
{

      public function init()
      {
            $class = str_replace( 'Controller', '', str_replace( 'Sistema_', '', __CLASS__ ) );
            $this->setClass( $class )
                      ->setTitle( "Administrando {$class}s" )
                      ->setWhere( null )
                      ->setOrder( 'nome asc' )
                      ->setCampos( array(
                            'nome' => 'Nome',
                            'id_cidade' => 'Cidade'
                                ) )
                      ->setCadastroTitle( "Adicionando novo $class" )
                      ->setTextoNovoRegistro( "Cadastre um $class" )
                      ->setEditarTitle( "Editando $class" )
                      ->getInit();
      }

}