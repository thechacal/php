<?php

class Forms_SugiraDesconto extends Zend_Form
{

      public function init()
      {
            $nome = new Zend_Form_Element_Text( 'nome' );
            $nome->setLabel('Nome da Empresa')
				 ->setAttribs(array('style' => 'width: 300px;'))
				 ->setRequired();

            $cidade = new Zend_Form_Element_Text( 'cidadee' );
            $cidade->setLabel('Cidade de Atuação')
            		 ->setAttribs(array('style' => 'width: 300px;'))
            		 ->setRequired();
            		 
            $ramo = new Zend_Form_Element_Text( 'ramo' );
            $ramo->setLabel('Ramo de Atuação')
            		 ->setAttribs(array('style' => 'width: 300px;'))
            		 ->setRequired()
            		 ->setDescription('ex.: Agência de Viagem');
            		 
            $site = new Zend_Form_Element_Text( 'site' );
            $site->setLabel('Website')
            		 ->setAttribs(array('style' => 'width: 300px;'))
            		 ->setRequired();

            $mensagem = new Zend_Form_Element_Textarea( 'mensagem' );
            $mensagem->setLabel('Comentários')
                     ->setAttribs(array('rows'=>8,'style' => 'border: 1px solid silver; font-size: 13px; margin: 0 !important; padding: 4px !important; width: 300px;'))
                     ->setRequired();

            $submit = new Zend_Form_Element_Button( 'Enviar' );
            $submit->setAttribs( array(
                  'type' => 'submit',
                  'class' => 'Enviar'
                      ) );

            $this->setAction( '' );
            $this->setAttribs(array('class'=>'sugiradescontoForm'));
            $this->setMethod( Zend_Form::METHOD_POST );
            $this->addElements( array(
                  $nome,
                  $cidade,
                  $ramo,
                  $site,
                  $mensagem,
                  $submit,
                      ) );
      }

}