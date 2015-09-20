<?php

class ConviteController extends Model_Modelo
{

      public function init()
      {
            
      }

      public function indexAction()
      {
      	
      	
			$layout = Zend_Layout::getMvcInstance();
            $layout->cidade = 'Outras Cidades';
            $layout->cidades = $this->getFieldsFromTable(new Model_Cidade_Table(),'nome');
            $layout->form = new Forms_Login();
            $layout->form_newsletter = new Forms_Newsletter();

            if ( Zend_Auth::getInstance()->hasIdentity() )
				$layout->id_usuario = Zend_Auth::getInstance()->getIdentity()->id;
            
            $this->view->titulo = "Convite";
      	
            $link = $this->getRequest()->getParam( 'link' );
            if ( Model_Access::isGuest() )
            {
                  if ( isset( $link ) )
                  {
                        $usuarioTbl = new Model_Usuario_Table();
                        $usuario = $usuarioTbl->select()->from( $usuarioTbl, 'id' )
                                            ->where( 'link_unico = ?', $link )->query()->fetch();

                        if ( $usuario !== false )
                        {
                              $form = new Forms_CadastroUsuario();

                              if ( $this->isPost() && $form->isValid( $this->getPost() ) )
                              {
                                    $data = $this->getPost();
                                    $tblNewsletter = new Model_Newsletter_Table();
                                    $registros = $tblNewsletter->fetchAll();

                                    foreach ( $registros as $registro )
                                    {
                                          if ( $registro['email'] == $data['email'] && $registro['id_cidade'] == $data['id_cidade'] )
                                          {
                                                $tblNewsletter->delete( array(
                                                      "{$tblNewsletter->getPkName()} = ?" => $registro['id']
                                                          ) );
                                          }
                                    }

                                    unset( $data['confirma_senha'] );
                                    $data['ip'] = $_SERVER['REMOTE_ADDR'];
                                    $data['senha'] = sha1( $data['senha'] );
                                    $data['link_unico'] = $this->getIdUnico( $usuarioTbl, 'link_unico', 6 );
                                    $this->handleSpecialInputs($data);
                                    $usuarioTbl->insert( $data );


                                    $registro = $usuarioTbl->fetchAll( array( 'email = ?' => $data['email'] ) )->toArray();
                                    $registro = $registro[0];
                                    $this->storageWrite( $registro, array( 'senha' ) );

                                    $this->criarConvite( $usuario['id'], $registro['id'] );
                                    
                                    $this->_redirect( '/' );
                              }

                              $form->setAction( "/convite/$link" );
                              $this->view->form = $form;
                        }
                        else
                        {
                              $this->redirect( '/' );
                        }
                  }
                  else
                  {
                        $this->redirect( '/' );
                  }
            }
            else
            {
                  $this->redirect( '/' );
            }
      }

      

}