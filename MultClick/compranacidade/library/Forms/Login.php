<?php

class Forms_Login extends Zend_Form
{

      public function init()
      {
            $email = new Zend_Form_Element_Text( 'mail' );
            $email->setLabel( 'E-mail' )
                      ->setRequired()
                      ->setAttrib( 'title', 'E-mail' );

            $senha = new Zend_Form_Element_Password( 'password' );
            $senha->setLabel( 'Senha' )
                      ->setRequired();

            $submit = new Zend_Form_Element_Button( 'Logar' );
            $submit->setAttribs( array(
                  'type' => 'submit',
                  'class' => 'Login'
                      ) );
                      
            $resgatar = new Zend_Form_Element_Hidden('resgatar');
            $resgatar->setDescription('<a href="/resgatarsenha/" class="resgatarsenha">Esqueci a Senha</a>')
					->setDecorators(array(
						'ViewHelper',
						array('Description', array('escape' => false, 'tag' => false)),
					));

            $this->setMethod( 'POST' );
            $this->setAction('/login/');
            $this->addElements( array(
                  $email,
                  $senha,
                  $submit,
                  $resgatar
                      ) );
      }

}
