<?php

class Forms_Newsletter extends Zend_Form
{

      public function init()
      {
            $email = new Zend_Form_Element_Text( 'email' );
            $email->setValue( 'E-mail' )
            	  ->setAttribs ( array(
            	  		'class' => 'input_text'
            	  ) );

            $cidade = new Zend_Form_Element_Text( 'cidade' );
            $cidade->setValue( 'Escolha a cidade' )
            	  ->setAttribs ( array(
            	  		'class' => 'select_outrascidades2',
            	  		'readonly' => 'readonly'
            	  ) );
            	  
            $submit = new Zend_Form_Element_Image( 'cadastrar' );
            $submit->setImage('/public/css/images/bt_receber_newsletter.png')
            	   ->setAttribs( array(
	                  'type' => 'submit',
	                  'class' => 'bt_cadastrar'
                   ) );

            $this->setMethod( 'POST' );
            $this->setAction('/newsletter/');
            $this->addElements( array(
                  $submit,
                  $email,
                  $cidade
                      ) );
      }

}
