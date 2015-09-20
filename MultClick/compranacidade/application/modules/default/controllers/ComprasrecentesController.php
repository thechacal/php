<?php

class ComprasrecentesController extends Model_Modelo
{

	private $cidades;
	private $nome;
	
    public function init()
    {
    	
            $this->cidades = new Model_Cidade_Table();
            
			$city = $this->getRequest()->getParam( 'cidade' );
           
            if ( $city && !$this->cidadeExists( $city ) )
            {
				$this->nome = "Natal"; 
            } else {
				$this->nome = $city;            	
            }

            if ( !$city )
            {
            	
                  $cidadeUsuario = self::getCity() ? self::getCity() : 'natal';
                  
                  if ( !$this->cidadeExists( $cidadeUsuario ) )
                  {
                        $cidadeUsuario = 'Natal';
                  }
                  if ( !Model_Access::isGuest() && self::isUsuarioComum() )
                  {
                        $cidade = $this->find( $this->cidades, $this->getStorage()->id_cidade );
                        $cidadeUsuario = $cidade['nome'];
                  }
				$this->nome = $cidadeUsuario;
            }
            
    }

    public function indexAction()
    {

    	
            $cidade = $this->getCidadeByNome( $this->getRequest()->getParam( 'cidade' ) );
            extract($cidade);
    	
			$layout = Zend_Layout::getMvcInstance();
            $layout->cidade = $this->nome;
            $layout->cidades = $this->getFieldsFromTable($this->cidades,'nome');
            $layout->form = new Forms_Login();
            $layout->form_newsletter = new Forms_Newsletter();

            if ( Zend_Auth::getInstance()->hasIdentity() )
				$layout->id_usuario = Zend_Auth::getInstance()->getIdentity()->id;
            
            $this->view->titulo = "Ofertas Recentes de $this->nome";
            
            $tbl = new Model_Oferta_Table();

            $ofertaRecentes = $this->fetchAll( $tbl, array(
                            'id_cidade = ?' => $id,
            				'status = ?' => 'Encerrada'
                                ),
								'id DESC' );
                                
            $ofertaRecentes2 = $this->fetchAll( $tbl, array(
                            'id_cidade = ?' => $id,
            				'status = ?' => 'Ativo'
                                ),
								'id DESC', 18446744073709551615, 4 );

			$ofertas = array_merge($ofertaRecentes,$ofertaRecentes2);
			
		    $page=$this->_getParam('page',1);
		    $paginator = Zend_Paginator::factory($ofertas);
		    $paginator->setItemCountPerPage(12);
		    $paginator->setCurrentPageNumber($page);
		
		    $this->view->paginator=$paginator;
			$this->view->cidade = $nome;
    }

}

