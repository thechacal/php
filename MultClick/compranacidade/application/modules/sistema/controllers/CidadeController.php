<?php

class Sistema_CidadeController extends Model_Modelo
{

      public function init()
      {
            $class = str_replace( 'Controller', '', str_replace( 'Sistema_', '', __CLASS__ ) );
            
            $this->setClass( $class )
                      ->setTitle( "Administrando {$class}s" )
                      ->setWhere( null )
                      ->setOrder( 'nome asc' )
                      ->setCampos( array(
                            'nome' => 'Nome'
                                ) )
                      ->setCadastroTitle( "Adicionando nova $class" )
                      ->setTextoNovoRegistro( "Cadastre uma $class" )
                      ->setEditarTitle( "Editando $class" )
                      ->getInit();
      }

}