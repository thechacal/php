<?php

/**
 * Para essa classe funcionar precisa-se de alguns cuidados:
 *
 * @tutorial
 * Os campos do formulario devem ter os names iguais aos nome dos campos do banco de dados.
 * Campos no banco que precisam de tramento especial devem ter as nomenclaturas adequadas.
 *   até agora foi implementado:
 *    - data (D_nomeDoCampo)       
 *    - dinheiro (M_nomeDoCampo)
 * Campos tipo file devem ter class MultiFile
 *
 */
class Model_Modelo extends Zend_Controller_Action
{
      /**
       * @var Model_Tabela
       */
      private $tbl;
      /**
       * @var Zend_Form
       */
      private $form;
      /**
       * Campos para mostrar na tabela, separados por virgula
       *
       * Formato :
        array(
        array(
        'nome_campo_db' => 'nome_campo_no_banco',
        'nome_campo_tabela' => 'Nome do Titulo da Coluna da Tabela'
        ),
        ) )
       *
       * @var Array
       */
      private $campos;
      /**
       * Ordem dos registros da tabela
       *
       * @var String
       */
      private $order = null;
      /**
       * Condicao para pegar os dados do banco para a tabela
       *
       * @var Array | String
       */
      private $where = null;
      /**
       * Titulo da pagina para o navegador e para a pagina
       *
       * @var String
       */
      private $title;
      /**
       * Dados do Post
       *
       * @var Array
       */
      private $data;
      /**
       * O nome da classe que esta chamando Model_Modelo
       * Essa string devera ser no formato
       *
       * @example NomedocontrollerController
       *
       * Ela instanciara dinamicamente o Formulario e a Tabela
       *
       * @var String
       */
      private $class;
      private $cadastroTitle;
      private $editarTitle;
      private $novoRegistroTexto;

      public function getInit()
      {
            if ( $this->isPost() )
            {
                  $this->data = $this->getPost();
                  $this->handleSpecialInputs();
            }
            
            $this->view->controller = $this->getRequest()->getControllerName();
      }

      public function indexAction()
      {
            $this->view->content = array(
                  'page_title' => $this->getPageTitle(),
                  'novo_registro' => $this->getNovoRegistroHtml( $this->novoRegistroTexto ),
                  'table' => $this->dataTable(),
            );
      }

      public function cadastrarAction()
      {
            if ( $this->isPost() && $this->form->isValid( $this->getPost() ) )
            {
            		           	
                  $this->receiveFiles();

                  $this->tbl->insert( $this->data );
                  
//    			  $imgs = explode(',',$this->data['imagens']);
//    			  $img = explode(',',$this->data['imagem_cupom']);
    			  
//    			  foreach($imgs as $v){
//    			  		if(!empty($v)){
//							$im = new imagick( $this->getUploadsPath().'/'.$v );
//							$height=$im->getImageHeight();
//							$width=$im->getImageWidth();
//	
//							if ($width > 459)
//								$im->scaleImage(459,375,true);
//							if ($height > 375)
//								$im->scaleImage(459,375,true);
//										
//							$im->resizeImage(459,375,Imagick::FILTER_LANCZOS,1);
//							$im->writeImage( $this->getUploadsPath().'/'.$v );
//							$im->clear();
//							$im->destroy();
//    			  		}
//    			  }
    			  
//                  foreach($img as $v){
//    			  		if(!empty($v)){
//							$im = new imagick( $this->getUploadsPath().'/'.$v );
//							$height=$im->getImageHeight();
//							$width=$im->getImageWidth();
//	
//							if ($width > 195)
//								$im->scaleImage(195,125,true);
//							if ($height > 125)
//								$im->scaleImage(195,125,true);
//										
//							$im->resizeImage(195,125,Imagick::FILTER_LANCZOS,1);
//							$im->writeImage( $this->getUploadsPath().'/'.$v );
//							$im->clear();
//							$im->destroy();
//    			  		}
//    			  }
                  
                  $this->redirect();
            }

            $this->view->title = $this->cadastroTitle;
            $this->view->form = $this->form;
      }

      /**
       * Recebe os arquivos em formulario de cadastro
       */
      public function receiveFiles()
      {
            $upload = new Zend_File_Transfer_Adapter_Http();
            $upload->setDestination( $this->getUploadsPath() );
            $files = $upload->getFileInfo();

            if ( $files )
            {
                  $alreadyUpdated = '';
                  foreach ( $files as $file => $info )
                  {
                        if ( preg_match( '/\_.*\_$/', $file ) )
                        {
                              $file = preg_replace( '/\_.*\_$/', '', $file );
                              if ( $file != $alreadyUpdated )
                              {
                                    $filesName = '';

                                    if ( isset( $this->data[$file] ) )
                                    {
                                          $filesName .= $this->data[$file];
                                          unset( $this->data[$file] );
                                    }

                                    foreach ( $_FILES[$file]['name'] as $filename )
                                    {
                                          if ( $filename )
                                          {
                                                $filesName .= $filename . ',';
                                                $upload->receive( $filename );
                                          }
                                    }

                                    $this->data[$file] = $filesName;
                                    $alreadyUpdated = $file;
                              }
                        }
                        else
                        {
                              if ( !isset( $this->data[$file] ) )
                              {
                                    if ( $info['name'] )
                                    {
                                          $this->data[$file] = $info['name'] . ',';
                                          $upload->receive( $info['name'] );
                                    }
                              }
                        }
                  }
            }
      }

      public function editarAction()
      {
            $registro = $this->find( $this->tbl, $this->getRequest()->getParam( 'id' ) );

            if ( $this->isPost() )
            {
            	
                  $this->validateZendDbRecordExistsOnUpdate( $registro );
                  $this->receiveFiles();

//    			  $imgs = explode(',',$this->data['imagens']);
//    			  $img = explode(',',$this->data['imagem_cupom']);
                  
//                  foreach($imgs as $v){
//    			  		if(!empty($v)){
//							$im = new imagick( $this->getUploadsPath().'/'.$v );
//							$height=$im->getImageHeight();
//							$width=$im->getImageWidth();
//	
//							if ($width > 459)
//								$im->scaleImage(459,375,true);
//							if ($height > 375)
//								$im->scaleImage(459,375,true);
//										
//							$im->resizeImage(459,375,Imagick::FILTER_LANCZOS,1);
//							$im->writeImage( $this->getUploadsPath().'/'.$v );
//							$im->clear();
//							$im->destroy();
//    			  		}
//    			  }
    			  
//                  foreach($img as $v){
//    			  		if(!empty($v)){
//							$im = new imagick( $this->getUploadsPath().'/'.$v );
//							$height=$im->getImageHeight();
//							$width=$im->getImageWidth();
//	
//							if ($width > 195)
//								$im->scaleImage(195,125,true);
//							if ($height > 125)
//								$im->scaleImage(195,125,true);
//										
//							$im->resizeImage(195,125,Imagick::FILTER_LANCZOS,1);
//							$im->writeImage( $this->getUploadsPath().'/'.$v );
//							$im->clear();
//							$im->destroy();
//    			  		}
//    			  }

                  if($this->getRequest()->getControllerName() == "parceiro")
	                  if(count($this->data['logo']) == 0)
							$this->data['logo'] = "";
							
                  
                  $this->tbl->update( $this->data, array(
                        "{$this->tbl->getPkName()} = ?" => $this->getRequest()->getParam( 'id' )
                            ) );

                  $this->redirect();
            }

            $this->reverseSpecialFields( $registro );
            $this->getFormValues( $registro );

            $submit = $this->form->getElement( 'submit' );
            $this->form->removeElement( 'submit' );
            $this->form->addElement( $submit );
            $this->form->getElement( 'submit' )->setLabel( 'Editar' )->setAttrib( 'class', 'Editar' );
            $this->view->registro = $registro;

            $this->view->title = $this->editarTitle;
            $this->view->form = $this->form;
      }

      public function getFormValues( $registro, Zend_Form &$form = null, Zend_Db_Table_Abstract &$tbl = null )
      {
            if ( is_null( $form ) )
            {
                  foreach ( $this->form->getElements() as $nome => $objeto )
                  {
                        $element = $this->form->getElement( $nome );
                        if ( isset( $registro[$nome] ) )
                        {
                              $element->setValue( $registro[$nome] );

                              /**
                               * Se o elemento for do tipo file, pega o valor dele no banco de dados
                               * e o bota em um campo hidden para mostrar as imagens
                               */
                              if ( strtolower( $element->getType() ) == 'zend_form_element_file' )
                              {
                                    $valorCampo = $this->tbl->find( $this->getRequest()->getParam( 'id' ) )->current()->__get( $nome );
                                    $label = $element->getLabel();
                                    $this->form->removeElement( $nome );

                                    // Caso forem multiplas imagens
                                    if ( $element->getAttrib( 'class' ) == 'MultiFile' )
                                    {
                                          $this->form->addElement( 'hidden', $nome, array(
                                                'class' => 'Imagens Mult',
                                                'id' => 'imagens-' . $nome,
                                                'value' => $valorCampo,
                                                'label' => $label,
                                                    ) );
                                    }
                                    else
                                    {
                                          $this->form->addElement( 'hidden', $nome, array(
                                                'class' => 'Imagens',
                                                'id' => 'imagens-' . $nome,
                                                'value' => $valorCampo,
                                                'label' => $label,
                                                    ) );
                                    }
                              }
                        }
                  }
            }
            else
            {
                  foreach ( $form->getElements() as $nome => $objeto )
                  {
                        $element = $form->getElement( $nome );
                        if ( isset( $registro[$nome] ) )
                        {
                              $element->setValue( $registro[$nome] );

                              /**
                               * Se o elemento for do tipo file, pega o valor dele no banco de dados
                               * e o bota em um campo hidden para mostrar as imagens
                               */
                              if ( strtolower( $element->getType() ) == 'zend_form_element_file' )
                              {
                                    $valorCampo = $tbl->find( $this->getRequest()->getParam( 'id' ) )->current()->__get( $nome );
                                    $label = $element->getLabel();
                                    $form->removeElement( $nome );

                                    // Caso forem multiplas imagens
                                    if ( $element->getAttrib( 'class' ) == 'MultiFile' )
                                    {
                                          $form->addElement( 'hidden', $nome, array(
                                                'class' => 'Imagens Mult',
                                                'id' => 'imagens-' . $nome,
                                                'value' => $valorCampo,
                                                'label' => $label,
                                                    ) );
                                    }
                                    else
                                    {
                                          $form->addElement( 'hidden', $nome, array(
                                                'class' => 'Imagens',
                                                'id' => 'imagens-' . $nome,
                                                'value' => $valorCampo,
                                                'label' => $label,
                                                    ) );
                                    }
                              }
                        }
                  }
            }
      }

      public function validateZendDbRecordExistsOnUpdate( &$registro, Zend_Form &$form = null, $data = null )
      {
            if ( is_null( $form ) )
            {
                  foreach ( $this->form->getElements() as $nome => $objeto )
                  {
                        if ( is_object( $this->form->getElement( $nome )->getValidator( 'Zend_Validate_Db_NoRecordExists' ) )
                                  && $this->data[$nome] == $registro[$nome] )
                        {
                              continue;
                        }
                  }
            }

            return $this;
      }

      /**
       * Trata os campos que precisam de tratamento
       * especial vindos do banco
       *
       * @param array $registro
       */
      public function reverseSpecialFields( array &$registro )
      {
            foreach ( $registro as $key => $value )
            {
                  if ( strstr( $key, 'D_' ) )
                  {
                        $registro[$key] = $this->getTime( 'd/m/Y \à\s H:i:s', $value );
                  }
                  elseif ( strstr( $key, 'M_' ) )
                  {
                        $registro[$key] = Model_Util::stringToMoney( $value );
                  }
            }

            return $this;
      }

      public function deletarAction()
      {
      	
            if ( $this->isPost() )
            {
                  foreach ( $this->data['registros'] as $id )
                  {
                        $this->tbl->delete( array(
                              "{$this->tbl->getPkName()} = ?" => $id
                                  ) );
                  }
            }

            $this->redirect();
      }

      /**
       * Verifica os names dos inputs e caso hajam inputs
       * que tenham no name algum dos valores abaixo, dao
       * tratamento especial dependendo dele
       *
       * M_   ->   Money            (ex. transforma 1.000,00 em 1000.00)
       * D_   ->   Date             (aplica strtoint no valor)
       */
      public function handleSpecialInputs( &$data = null )
      {
            if ( is_null( $data ) )
            {
                  foreach ( $this->data as $nome => $valor )
                  {
                        if ( strstr( $nome, 'M_' ) )
                        {
                              $this->data[$nome] = $this->makeDbMoney( $valor );
                        }
                        elseif ( $nome == 'MAX_FILE_SIZE' || $nome == 'submit' )
                        {
                              unset( $this->data[$nome] );
                        }
                        elseif ( strstr( $nome, 'D_' ) )
                        {
                              $this->data[$nome] = strtotime( $this->specialBrToEngTime( $valor ) );
                        }
                  }
            }
            else
            {
                  foreach ( $data as $nome => $valor )
                  {
                        if ( strstr( $nome, 'M_' ) )
                        {
                              $data[$nome] = $this->makeDbMoney( $valor );
                        }
                        elseif ( $nome == 'MAX_FILE_SIZE' || $nome == 'submit' )
                        {
                              unset( $data[$nome] );
                        }
                        elseif ( strstr( $nome, 'D_' ) )
                        {
                              $data[$nome] = strtotime( $this->specialBrToEngTime( $valor ) );
                        }
                  }
            }
      }

      /**
       * Faz um tratamento personalizado para a hora,
       * transformadoa do formato dd/mm/aaaa às hh:mm:ss
       * para formato unix
       *
       * @param String $time
       * @param String $dateSeparator - separador da data, padrao é barra "/"
       * @return <type>
       */
      public function specialBrToEngTime( $time, $dateSeparator = '/' )
      {
            $time = explode( ' ', $time );
            list($dia, $mes, $ano) = explode( $dateSeparator, $time[0] );

            $time = array_reverse( $time );

            $ret = "$ano-$mes-$dia {$time[0]}";

            return $ret;
      }

      /**
       * Retorna a tabela com os campos selecionados do respectivo objeto
       */
      public function dataTable()
      {
            $registros = $this->fetchAll( $this->tbl, $this->where, $this->order );

            $html = '<table class="DataTable" id="' . $this->getRequest()->getControllerName() . '-table">';
            $html .= '<thead>';
            $html .= '<tr>';

            foreach ( $this->campos as $campo )
            {
                  if ( is_array( $campo['nome_campo_tabela'] ) )
                  {
                        $html .= '<th class="item item-' . $campo['nome_campo_db'] . '">' . $campo['nome_campo_tabela']['titulo'] . '</th>';
                  }
                  else
                  {
                        $html .= '<th class="item item-' . $campo['nome_campo_db'] . '">' . $campo['nome_campo_tabela'] . '</th>';
                  }
            }

            $html .= '<th class="item opcoes" width="10%">Editar</th>';
            $html .= '<th class="item opcoes" width="10%">Excluir';
            $html .= '<div id="remover-registros-wrapper" class="none">';
            $html .= '<form id="form-' . $this->getRequest()->getControllerName() . '" class="FormRemover" action="/' . $this->getRequest()->getModuleName() . '/' . $this->getRequest()->getControllerName() . '/deletar/" method="post">';
            $html .= '<input type="hidden" name="acao" value="Remover" />';
            $html .= '<button class="Remover" type="submit">
                        <div class="ui-button ui-icon ui-icon-trash"></div>
                        <div class="ui-button-text">Remover</div>
                  </button>';
            $html .='<div id="valores-remover" style="display:none;"></div>';
            $html .='</form>';
            $html .='</div>';
            $html .= '</th>';
            $html .= '</tr>';
            $html .= '</thead>';

            $html .= '<tbody>';

            foreach ( $registros as $i => $registro )
            {
                  $html .= '<tr class="item item-' . ($i + 1) . '">';

                  foreach ( $this->campos as $campo )
                  {
                        if ( array_key_exists( $campo['nome_campo_db'], $registro ) )
                        {
//                              if ( $registro[$campo['nome_campo_db']] )
//                              {
                              if ( strstr( $campo['nome_campo_db'], 'D_' ) )
                              {
                                    $registro[$campo['nome_campo_db']] = date( 'd/m/Y  H:i:s', $registro[$campo['nome_campo_db']] );
                              }
                              
                              if( $campo['nome_campo_db'] == 'id_cidade' )
                              {
                              		$cidade = $this->getCidadeById($registro[$campo['nome_campo_db']]);
                              		$registro[$campo['nome_campo_db']] = $cidade['nome'];
                              }
                              
                              if ( is_array( $campo['nome_campo_tabela'] ) )
                              {
                              		$reg = $registro[$campo['nome_campo_tabela']['campo']];
                                    $html .= '<td class="data">' . strip_tags($reg) . '</td>';
                              }
                              else
                              {
                                    $html .= '<td class="data">' . strip_tags($registro[$campo['nome_campo_db']]) . '</td>';
                              }
//                              }
//                              else
//                              {
//                                    $html .= '<td class="data">Não cadastado</td>';
//                              }
                        }
                  }

                  $module = $this->getRequest()->getModuleName() == 'default' ? '' : $this->getRequest()->getModuleName();
                  $html .= '<td class="item editar">';
                  $html .= '<form action="/' . $module . '/' . $this->getRequest()->getControllerName() . '/editar">';
                  $html .='<input type="hidden" name="id" value="' . $registro[$this->tbl->getPkName()] . '" />';
                  $html .='<button type="submit" class="editar-registro" id="data-' . $registro[$this->tbl->getPkName()] . '">Editar</button>
                        </form>';

                  $html .= '</td>';
                  $html .= '<td class="item remover">';
                  $html .= '<input type="checkbox" name="registros[]" value="' . $registro[$this->tbl->getPkName()] . '" class="remove_registro" id="check-' . $registro['id'] . '" /><label for="check-' . $registro['id'] . '">Selecionar</label>';
                  $html .= '</td>';
                  $html .= '</tr>';
            }

            $html .= '</tbody>';
            $html .= '</table>';

            return $html;
      }

      /**
       * Retorna o Html para o link de novo registro
       *
       * @param String $texto - texto para o link
       * @return String
       */
      public function getNovoRegistroHtml( $texto )
      {
            $url = '/' . $this->getRedirectLink();
            $html = '<div id="adicionar-registro-wrapper">';
            $html .= '<a href="' . $url . '/cadastrar" id="adicionar-registro">';
            $html .= '<span class="ui-icon ui-icon-circle-plus"></span>';
            $html .= $texto . '</a>';
            $html .= '</div>';

            return $html;
      }

      /**
       * Campos para mostrar na tabela, separados por virgula
       *
       * Formato :
       * array( 'nome_campo_no_banco'  =>  'Nome do Titulo da Coluna', )
       *
       * @return Model_Modelo
       */
      public function setCampos( array $campos )
      {
            $newCampos = Array( );
            foreach ( $campos as $campoDb => $campoTabela )
            {
                  $newCampos[] = array(
                        'nome_campo_db' => $campoDb,
                        'nome_campo_tabela' => $campoTabela,
                  );
            }
            
            $this->campos = $newCampos;

            return $this;
      }

      /**
       * Retorna os campos passados da tabela dada
       *
       * @param Zend_Db_Table_Abstract $tbl
       * @param String $campos
       * @param array $where
       * @param String $order
       * @return Array dos campos passados
       */
      public function getFieldsFromTable( Zend_Db_Table_Abstract $tbl, $campos, $where = null, $order = null )
      {
            $query = $tbl->select();
            $query = $query->from( $tbl, $campos );

            if ( !is_null( $where ) && $where )
                  $query = $query->where( $where );

            if ( !is_null( $order ) && $order )
                  $query = $query->order( $order );
                  
            return $query->query()->fetchAll();
      }

      /**
       * Redireciona o usuario para sua area
       */
      protected function redirectAutenticatedUser()
      {
            if ( Zend_Auth::getInstance()->getStorage()->read()->is_admin )
                  $this->_redirect( '/admin/' );
            else
            {
                  $acesso = new Model_Acesso();
                  $acesso->insert( array(
                        'login' => Zend_Auth::getInstance()->getStorage()->read()->login,
                        'data' => date( 'd/m/Y H:i:s' ),
                        'descricao' => 'Logou no sistema',
                            ) );

                  $this->_redirect( '/corretor/' );
            }
      }

      /**
       * Desabilita a renderizacao do Layout
       */
      public function disableRenderLayout()
      {
            $this->_helper->layout()->disableLayout();
            $this->_helper->viewRenderer->setNoRender();
      }

      /**
       * Retorna o formulario do objeto atual
       *
       * @return Zend_Form
       */
      public function getForm()
      {
            return $this->form;
      }

      /**
       * Retorna a tabela do objeto atual
       *
       * @return Zend_Db_Table_Abstract
       */
      public function getTable()
      {
            return $this->tbl;
      }

      /**
       * Seta a ordem dos registros da tabela
       *
       * @var String
       */
      public function setOrder( $order )
      {
            $this->order = $order;

            return $this;
      }

      /**
       * Seta a condicao para pegar os dados do banco para a tabela
       *
       * @var Array | String
       */
      public function setWhere( $where )
      {
            $this->where = $where;

            return $this;
      }

      /**
       * Titulo da pagina para o navegador e para a pagina
       *
       * @var String
       */
      public function setTitle( $title )
      {
            $this->title = $title;

            return $this;
      }

      /**
       *
       * @return <type>
       */
      public function getPageTitle()
      {
            return '<div id="page-title">' . $this->title . '</div>';
      }

      /**
       * Seta o titulo na variavel estatica $title do Bootstrap
       * que servira para dar titulo a pagina no browser
       */
      public function setBrowserTitle()
      {
            Bootstrap::$title = $this->title;
      }

      /**
       * Seta o formulario para a pagina
       * @return Model_Modelo
       */
      public function setForm()
      {
            $form = 'Model_' . $this->class . '_Form';
            $this->form = new $form();

            return $this;
      }

      /**
       *
       * @param Zend_Db_Table_Abstract $tbl
       * @param <type> $where
       * @param <type> $order
       * @param <type> $count
       * @param <type> $offset
       * @return <type>
       */
      public function fetchAll( Zend_Db_Table_Abstract &$tbl, $where = null, $order = null, $count = null, $offset = null )
      {
            return $tbl->fetchAll( $where, $order, $count, $offset )->toArray();
      }

      /**
       * Retorna o registro da respectiva chave passada
       * @param Zend_Db_Table_Abstract $tbl
       * @param <type> $search
       * @return <type>
       */
      public function find( Zend_Db_Table_Abstract $tbl, $search )
      {
            $registro = $tbl->find( $search )->current();

            return $registro->toArray();
      }

      /**
       * Verifica se o metodo eh Post
       * @return bool
       */
      public function isPost()
      {
            return $this->getRequest()->isPost();
      }

      /**
       * Pega os dados do Post
       * @return array
       */
      public function getPost()
      {
            return $this->getRequest()->getPost();
      }

      /**
       * O nome da classe que esta chamando Model_Modelo
       * Essa string devera ser no formato
       *
       * @example NomedocontrollerController
       *
       * Ela instanciara dinamicamente o Formulario e a Tabela
       *
       * @param String $class
       * @return objeto atual
       */
      public function setClass( $class )
      {
            $this->class = $class;

            $this->setTable()
                      ->setForm();

            return $this;
      }

      public function setTable()
      {
            $table = 'Model_' . $this->class . '_Table';
            $this->tbl = new $table();

            return $this;
      }

      /**
       * Retorna o titulo
       *
       * @return String
       */
      public function getTitle()
      {
            return $this->title;
      }

      /**
       * Gera o padrao para inserir valor tipo dinheiro no banco de dados
       *
       * @param String $string
       * @return String
       */
      public function makeDbMoney( $string )
      {
            return str_replace( ',', '.', str_replace( '.', '', $string ) );
      }

      public function setCadastroTitle( $title )
      {
            $this->cadastroTitle = $title;

            return $this;
      }

      public function setEditarTitle( $title )
      {
            $this->editarTitle = $title;

            return $this;
      }

      public function setTextoNovoRegistro( $texto )
      {
            $this->novoRegistroTexto = $texto;

            return $this;
      }

      /**
       * Pega a hora baseando-se na hora passada
       *
       * @param String $pattern - padrao para retorno ( ex. d/m/y )
       * @param UnixTime $baseTime
       * @param UnixTime $additional
       * @return String
       */
      public function getTime( $pattern, $baseTime = 'time()', $additional = 0 )
      {
            if ( $baseTime === 'time()' )
            {
                  $baseTime = time();
            }

            return date( $pattern, $baseTime + $additional );
      }

      /**
       * Redireciona para o modulo atual
       */
      public function redirect( $url = null )
      {
            if ( is_null( $url ) )
            {
                  $this->_redirect( $this->getRedirectLink() );
            }
            else
            {
                  $this->_redirect( $url );
            }
      }

      public function getRedirectLink()
      {
            return $this->getRequest()->getModuleName() . '/' . $this->getRequest()->getControllerName();
      }

      public function getUploadsPath()
      {
//      	echo $_SERVER['DOCUMENT_ROOT'] . '/compranacidade/uploads/';exit;
      		$caminho = explode('/library/',realpath(dirname(__FILE__)));
      		return realpath($caminho[0].'/uploads/');
//            return realpath( $_SERVER['DOCUMENT_ROOT'] . '/uploads/' );
      }

      public function getCadastroTitle()
      {
            return $this->cadastroTitle;
      }

      public function getEditarTitle()
      {
            return $this->editarTitle;
      }

      public function getData( $index = null )
      {
            if ( is_null( $index ) )
            {
                  return $this->data;
            }
            else
            {
                  return $this->data[$index];
            }
      }

      public function setData( $index, $valor )
      {
            $this->data[$index] = $valor;
      }

      public static function isAdmin()
      {
            return self::getTipoUsuario() == 'admin';
      }

      public static function isUsuarioComum()
      {
            return self::getTipoUsuario() == 'cliente';
      }

      public static function getTipoUsuario()
      {
            return strtolower( Zend_Auth::getInstance()->getStorage()->read()->tipo_usuario );
      }

      public static function getCity()
      {
            $ip = $_SERVER['REMOTE_ADDR'];
            $response = file_get_contents( "http://www.geoplugin.net/php.gp?ip=$ip" );

            $array = var_export( unserialize( $response ), 1 );
            eval( '$array = ' . $array . ';' );

            $cidade = $array['geoplugin_city'];
            return $cidade;
      }

      public function cidadeExists( $nome )
      {
            return (bool) Zend_Db_Table_Abstract::getDefaultAdapter()->query( "select id from cidade where nome = '$nome'" )->fetch();
      }

      public function getCidadeByNome( $nome )
      {
            return Zend_Db_Table_Abstract::getDefaultAdapter()->query( "select * from cidade where nome = '$nome'" )->fetch();
      }
      
      public function getCidadeById( $id )
      {
            return Zend_Db_Table_Abstract::getDefaultAdapter()->query( "select * from cidade where id = $id" )->fetch();
      }

      public function getStorage()
      {
            return Zend_Auth::getInstance()->getStorage()->read();
      }

      // retorna valor com 2 casas apos virgula, permitindo 0
      static function getMoney( $string )
      {
            return rtrim( sprintf( '%.2f', $string ), '.' );
      }

      // retorna valor com 2 casas apos virgula, porem, nao permitindo 0
      static function getOff( $string )
      {
//            return rtrim( rtrim( sprintf( '%.2f', $string ), '0' ), '.' );
            return rtrim( sprintf( '%.0f', $string ), '.' );
      }

      /**
       * Gera id unico para a tabela dada,
       *
       * @param Zend_Db_Table_Abstract $tbl
       * @param String $campo campo da tabela para comparar se existe o ID
       * @param int $numCaracteres numero de caracteres que o codigo tera
       */
      public function getIdUnico( Zend_Db_Table_Abstract $tbl, $campo, $numCaracteres )
      {
            $codigo = '';
//            $chars = explode( ',', 'a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,w,u,v,x,y,z,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,W,U,V,X,Y,Z,0,1,2,3,4,5,6,7,8,9' );
            $chars = explode( ',', 'A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,W,U,V,X,Y,Z,0,1,2,3,4,5,6,7,8,9' );
            for ( $i = 0; $i < $numCaracteres; $i++ )
            {
                  $codigo .= $chars[array_rand( $chars, 1 )];
            }

            $exists = $tbl->fetchAll( array(
                            "$campo = ?" => $codigo
                                ) )->toArray();

            if ( $exists )
            {
                  while ( $exists )
                  {
                        $codigo = '';
                        for ( $i = 0; $i < $numCaracteres; $i++ )
                              $codigo .= $chars[array_rand( $chars, 1 )];

                        $exists = $tbl->fetchAll( array(
                                        "$campo = ?" => $codigo
                                            ) )->toArray();
                  }
            }

            return $codigo;
      }

      public function makeMoipMoney( $string )
      {
            $string = str_replace( ',', '', $string );
            $string = str_replace( '.', '', $string );

            return $string;
      }

      public function storageWrite( array $data, array $excludeFields )
      {
            $dados = new stdClass();
            foreach ( $data as $key => $val )
            {
                  if ( !in_array( $key, $excludeFields ) )
                  {
                        $dados->$key = $val;
                  }
            }

            Zend_Auth::getInstance()->getStorage()->write( $dados );
      }

      public function criarConvite( $idUsuario, $idUsuarioConvidado )
      {
            $data['id_usuario'] = $idUsuario;
            $data['id_usuario_convidado'] = $idUsuarioConvidado;
            $data['data_cadastro'] = time();

            $conviteTbl = new Model_Convite_Table();
            $conviteTbl->insert( $data );
      }

      public function getUsuarioConvites( $idUsuario )
      {
            $conviteTbl = new Model_Convite_Table();
            $convites = $conviteTbl->fetchRow( array(
                            'id_usuario_convidado = ?' => $idUsuario
                                ) );

            if ( $convites )
            {
                  return $convites->toArray();
            }
            else
            {
                  return false;
            }
      }

      protected function sendMsg( $title, $content )
      {
            echo "<script type='text/javascript'>
            $(function(){
                  $( '#dialog' ).html('$content');
                  $( '#dialog' ).dialog({
                        title: '$title',
                        resizable: false,
                        height: 140,
                        modal: true,
                        buttons: {
                              Ok: function() {
                                    $( this ).dialog( 'close' );
                              }
                        }
                  });
            });
            </script>";
      }

      protected function senhaAleatoria(){
			$vogais = 'aeiou';
			$consoante = 'bcdfghjklmnpqrstvwxyzbcdfghjklmnpqrstvwxyz';
			$numeros = '123456789';
			$resultado = ''; 
			
			$a = strlen($vogais)-1;
			$b = strlen($consoante)-1;
			$c = strlen($numeros)-1;
			
			for($x=0;$x<=1;$x++){
				$aux1 = rand(0,$a);
				$aux2 = rand(0,$b);
				$aux3 = rand(0,$c);
				
				$str1 = substr($consoante,$aux1,1);
				$str2 = substr($vogais,$aux2,1);
				$str3 = substr($numeros,$aux3,1);
				
				$resultado .= $str1.$str2.$str3;
				$resultado = trim($resultado);
			} 
			
			return $resultado;  	
      }
}