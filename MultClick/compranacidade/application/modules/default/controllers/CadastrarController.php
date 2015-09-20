<?php

class CadastrarController extends Model_Modelo
{
      private $form;
      private $tbl;
	  private $cidades;

      public function init()
      {
            $this->form = new Forms_CadastroUsuario();
            $this->tbl = new Model_Usuario_Table();
            $this->cidades = new Model_Cidade_Table();
            $this->getInit();
      }

      public function indexAction()
      {
      	
			$layout = Zend_Layout::getMvcInstance();
            $layout->cidade = 'Outras Cidades';
            $layout->cidades = $this->getFieldsFromTable($this->cidades,'nome');
            $layout->form = new Forms_Login();
            $layout->form_newsletter = new Forms_Newsletter();

            if ( Zend_Auth::getInstance()->hasIdentity() )
				$layout->id_usuario = Zend_Auth::getInstance()->getIdentity()->id;
            
            $this->view->titulo = "Cadastro";
      	
            if ( !Model_Access::isGuest() )
            {
                  $this->redirect( '/' );
            }

            if ( $this->isPost() && $this->form->isValid( $this->getPost() ) )
            {
                  $data = $this->getData();
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
                  $data['link_unico'] = $this->getIdUnico( $this->tbl, 'link_unico', 6);
                  $this->handleSpecialInputs($data);
                  $this->tbl->insert( $data );


                  $registro = $this->tbl->fetchAll( array( 'email = ?' => $data['email'] ) )->toArray();
                  $registro = $registro[0];
                  $this->storageWrite( $registro, array( 'senha' ) );

                  $this->_redirect( '/' );
            }

            $this->view->form = $this->form;
      }

      

}