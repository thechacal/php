<?php

class Conta_MeusDadosController extends Model_Modelo
{

	  private $tbl_usuario;
	  private $tbl_newsletter;
	
      public function init()
      {
            $this->tbl_usuario = new Model_Usuario_Table();
            $this->tbl_newsletter = new Model_Newsletter_Table();
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
            
            $this->view->titulo = "Meus Dados";
      	
            $usuario = $this->find( $this->tbl_usuario, $this->getStorage()->id );

            $form = new Forms_CadastroUsuario();
            $form->setAction( '/conta/meus-dados' );
            $form->getElement( 'submit' )->setLabel( 'Editar' );
            $form->removeElement( 'nome' );
            $form->removeElement( 'cpf' );
            $form->removeElement( 'data_nascimento' );
            $form->removeElement( 'email' );
            $form->getElement( 'senha' )
                      ->setDescription( 'Se não desejar editar sua senha, deixe-a em branco' )
                      ->setRequired( false );
            $form->getElement( 'confirma_senha' )
                      ->setRequired( false );


            if ( $this->isPost() )
            {
                  $data = $this->getPost();
                  if ( $data['senha'] )
                  {
                        $form->getElement( 'confirma_senha' )
                                  ->setRequired();
                  }
                  $form->getElement( 'confirma_senha' )
                            ->addValidator( new Zend_Validate_Identical( $data['senha'] ) );
            }

            if ( $this->isPost() && $form->isValid( $this->getPost() ) )
            {
                  $data = $this->getPost();
                  if ( !$data['senha'] )
                  {
                        unset( $data['senha'] );
                  }
                  else
                  {
                        $data['senha'] = sha1( $data['senha'] );
                  }
                  unset( $data['confirma_senha'] );
                  
				  if($data['newsletter'] == 0){
	    				$select = $this->tbl_usuario->select()->from(array('u'=>'usuario'), array('email'=>'u.email'))->where('u.id = '.$usuario['id'])->query()->fetchAll();
						$this->tbl_newsletter->update( array( 'inscricao_cancelada' => 1 ), array( "email = ?" => $select[0]['email'], "confirmado" => 1 ) );
				  } else {
	    				$select = $this->tbl_usuario->select()->from(array('u'=>'usuario'), array('email'=>'u.email'))->where('u.id = '.$usuario['id'])->query()->fetchAll();
						$this->tbl_newsletter->update( array( 'inscricao_cancelada' => 0 ), array( "email = ?" => $select[0]['email'], "confirmado" => 1 ) );				  	
				  }

                  $this->handleSpecialInputs( $data );
                  $this->tbl_usuario->update( $data, array(
                        'id = ?' => $usuario['id']
                            ) );
                  	
                  $_SESSION['msg']['title'] = 'Sucesso';
				  $_SESSION['msg']['content'] = 'A sua conta foi editada com sucesso!';
                            
                  $this->redirect( '/conta/meus-dados' );
            }

            $this->getFormValues( $usuario, $form, $this->tbl_usuario );



            $this->view->form = $form;

      }

}