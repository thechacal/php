<?php

class Sistema_PedidoController extends Model_Modelo
{

      public function init()
      {
            $class = str_replace( 'Controller', '', str_replace( 'Sistema_', '', __CLASS__ ) );

            $this->setClass( $class )
                      ->setTitle( "Administrando {$class}s" )
                      ->setWhere( null )
                      ->setOrder( array( 'titulo asc', 'D_data_fim desc' ) )
                      ->setCampos( array(
                            'titulo' => 'Titulo',
                            'D_data_inicio' => 'Data Inicial',
                            'D_data_fim' => 'Data Final',
                            'status' => 'Status',
                                ) )
                      ->setCadastroTitle( "Adicionando nova $class" )
                      ->setTextoNovoRegistro( "Cadastre uma $class" )
                      ->setEditarTitle( "Editando $class" )
                      ->getInit();
      }

}