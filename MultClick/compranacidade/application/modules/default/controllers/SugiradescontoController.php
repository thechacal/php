<?php

class SugiradescontoController extends Model_Modelo
{

	private $cidades;
	private $form;
	
    public function init()
    {
    	$this->cidades = new Model_Cidade_Table();
    	$this->form = new Forms_SugiraDesconto();
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
            
            $this->view->titulo = "Sugira um Desconto";
            
    		if ( $this->isPost() )
            {
            	$data = $this->getPost();
            	          	
					$mail = new Model_PHPMailer();
					$mail->IsSMTP(); // mandar via SMTP
					$mail->From = "no-reply@compranacidade.com.br";
					$mail->Subject = "Compra na Cidade - Sugira um Desconto";
					$mail->FromName = "Compra na Cidade";
					$mail->SetLanguage( 'br' );
					$mail->IsHTML(true);
					$mail->Charset = 'utf-8';

					$dados = '<font face="Arial" size="2"><strong>Nome da Empresa:</strong> ' . utf8_decode($data['nome']).'<br/>';
					$dados .= '<strong>Cidade de Atuação:</strong> ' . utf8_decode($data['cidade']).'<br/>';
					$dados .= '<strong>Ramo de Atuação:</strong> ' . utf8_decode($data['ramo']).'<br/>';
					$dados .= '<strong>Website:</strong> <a href="'.$data['site'].'" target="_blank">'.$data['site'].'</a><br/>';
					$dados .= '<strong>Comentários:</strong> ' . utf8_decode($data['mensagem']).'</font>';
					
					$msg = '<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
								<tr>
									<td></td>
								</tr>
								<tr>
									<td><img src="http://compranacidade.com.br/public/css/images/header.jpg" width="600" height="103" /></td>
								</tr>
								<tr>
									<td>'.$dados.'</td>
								</tr>
							</table>';
					
					$mail->Body = $msg;
					$mail->AddAddress( 'contato@compranacidade.com.br' );
					
					$mail->Send();
            		
            }
            
            $this->view->form = $this->form;
    }

}

