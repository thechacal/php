<?php

class Forms_Contato extends Zend_Form
{

      public function init()
      {
            $nome = new Zend_Form_Element_Text( 'nome' );
            $nome->setLabel('Nome')
				 ->setAttribs(array('style' => 'width: 300px;'))
				 ->setRequired();

            $telefone = new Zend_Form_Element_Text( 'telefone' );
            $telefone->setLabel('Telefone')
            		 ->setAttribs(array('style' => 'width: 300px;', 'class'=>'Telefone'))
            		 ->setRequired();

            $email = new Zend_Form_Element_Text( 'mail-form' );
            $email->setLabel('E-mail')
                  ->setAttribs(array('style' => 'width: 300px;'))
                  ->setRequired();

            $assunto = new Zend_Form_Element_Select( 'assunto' );
            $assunto->setAttribs(array('class' => 'select'))
                  ->setMultiOptions( array(
                  		'Dúvida sobre o e-mail diário' => 'Dúvida sobre o e-mail diário',
	 	                'Problemas com o Parceiro que oferece a Oferta' => 'Problemas com o Parceiro que oferece a Oferta',
						'Não recebi meu cupom' => 'Não recebi meu cupom',
	                    'Não recebi créditos' => 'Não recebi créditos',
	                    'Erro no site' => 'Erro no site',
	                    'Dúvida sobre pagamento' => 'Dúvida sobre pagamento',
	                    'Sugestão' => 'Sugestão',
	                    'Reclamação' => 'Reclamação',
	                    'Outros' => 'Outros'
                  ) )
                  ->setLabel('Assunto')
                  ->setAttribs(array('style'=>'border: 1px solid silver; font-size: 13px; margin: 0 !important; padding: 5px; width: 310px;'));
                                        
            $mensagem = new Zend_Form_Element_Textarea( 'mensagem' );
            $mensagem->setLabel('Mensagem')
                     ->setAttribs(array('rows'=>8,'style' => 'border: 1px solid silver; font-size: 13px; margin: 0 !important; padding: 4px !important; width: 300px;'))
                     ->setRequired();

            $submit = new Zend_Form_Element_Button( 'Enviar' );
            $submit->setAttribs( array(
                  'type' => 'submit',
                  'class' => 'Enviar'
                      ) );

            $this->setAction( '' );
            $this->setAttribs(array('class'=>'contatoForm'));
            $this->setMethod( Zend_Form::METHOD_POST );
            $this->addElements( array(
                  $nome,
                  $email,
                  $telefone,
                  $assunto,
                  $mensagem,
                  $submit,
                      ) );
      }

}