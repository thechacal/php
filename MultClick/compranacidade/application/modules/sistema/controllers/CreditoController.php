<?php

class Sistema_CreditoController extends Model_Modelo
{
	
	  private $form_credito;
	  private $tbl_credito;
	
      public function init()
      {
      		$this->form_credito = new Model_Credito_Form();
      		$this->tbl_credito = new Model_Credito_Table();
      }

      public function indexAction()
      {
			$this->view->content = array('page_title' => 'Cr&eacute;ditos');
			
      		$usuario = Zend_Auth::getInstance()->getIdentity();
			$this->view->usuario = $usuario;
			
			$data = $this->_request->getPost();
	
			$dados = $this->tbl_credito->select()->from( $this->tbl_credito, 'M_valor' )->query()->fetch();
			$this->form_credito->getElement('M_valor')->setValue(Model_Util::stringToMoney( $this->getMoney( $dados['M_valor'] ) ));
						
	        if ( $this->_request->isPost() && $this->form_credito->isValid( $data ) )
	        {
	        	
	        		$data = array('M_valor'=>$this->makeDbMoney( $data['M_valor'] ));
	        		
					
					$existe = $this->tbl_credito->select()->from( $this->tbl_credito, 'COUNT(*) as total' )
                        	->where( 'id=?', 0 )
							->query()->fetch();
                                
					if($existe['total'] != 0)
						$this->tbl_credito->update( $data, array( "id = ?" => 0 ) );						
					else
	        			$this->tbl_credito->insert($data);
	        		
					$this->form_credito->getElement('M_valor')->setValue($data['M_valor']);
	        			
			    	session_start();
			    
			    	$_SESSION['msg']['content'] = 'O valor do cr&eacute;ditos foi alterado com sucesso!';
			    	$_SESSION['msg']['title'] = 'Sucesso!';
	        }
	        $this->view->form = $this->form_credito;
	        
      }

}