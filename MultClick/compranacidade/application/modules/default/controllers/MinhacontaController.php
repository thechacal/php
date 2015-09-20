<?php

class MinhacontaController extends Model_Modelo
{

    private $form;
    private $tbl;
	private $cidades;
	
    public function init()
    {
            $this->form = new Forms_MinhaConta();
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
            
            $this->view->titulo = "Minha Conta";

			if ( Model_Access::isGuest() )
            {
                  $this->redirect( '/' );
            }
            
            $id_usuario = base64_decode($this->getRequest()->getParam('id'));
			$usuario = $this->find( $this->tbl, $id_usuario );

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
                  $this->handleSpecialInputs($data);
                  $this->tbl->update( $data , array( 'id=?' => $id_usuario ) );

                  $registro = $this->tbl->fetchAll( array( 'email = ?' => $data['email'] ) )->toArray();
                  $registro = $registro[0];
                  $this->storageWrite( $registro, array( 'senha' ) );

                  $this->_redirect( '/' );
                  
            } else {
				$this->form->getElement( 'id_cidade' )->setValue( $usuario['id_cidade'] );
				$this->form->getElement( 'nome' )->setValue( $usuario['nome'] );
				$this->form->getElement( 'email' )->setValue( $usuario['email'] );
				$this->form->getElement( 'newsletter' )->setValue( $usuario['newsletter'] );
				$this->form->getElement( 'data_nascimento' )->setValue( $usuario['data_nascimento'] );
				$this->form->getElement( 'telefone' )->setValue( $usuario['telefone'] );
            }

            $this->view->form = $this->form;
    }

}

