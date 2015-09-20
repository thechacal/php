<?php

class Sistema_OfertaController extends Model_Modelo
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
                            'id_cidade' => 'Cidade',
                            'D_data_inicio' => 'Data Inicial',
                            'D_data_fim' => 'Data Final',
                            'status' => 'Status'
                                ) )
                      ->setCadastroTitle( "Adicionando nova $class" )
                      ->setTextoNovoRegistro( "Cadastre uma $class" )
                      ->setEditarTitle( "Editando $class" )
                      ->getInit();

            $now = time();
            $tbl = new Model_Oferta_Table();
            $ofertas = $this->fetchAll( $tbl );
            foreach ( $ofertas as $oferta )
            {
                  if ( $oferta['D_data_inicio'] < $now
                            && $oferta['D_data_fim'] < $now
                            && $oferta['status'] == 'Ativo' )
                  {
                        $tbl->update( array(
                              'status' => 2
                                  ), array(
                              "{$tbl->getPkName()} = ?" => $oferta['id']
                                  ) );
                  }
//                  if ( $oferta['D_data_fim'] < $now && $oferta['status'] != 'Encerrada' )
//                  {
//                        $tbl->update( array(
//                              'status' => 2
//                                  ), array(
//                              "{$tbl->getPkName()} = ?" => $oferta['id']
//                                  ) );
//                  }
            }
      }

}