<?php

class Forms_LoginAdmin extends Zend_Form
{

      public function init()
      {
            $username = new Zend_Form_Element_Text( 'username' );
            $username->setLabel( 'Login' )->setRequired();

            $senha = new Zend_Form_Element_Password( 'password' );
            $senha->setLabel( 'Senha' )->setRequired();

            $submit = new Zend_Form_Element_Button( 'Logar' );
            $submit->setAttribs( array(
                  'type' => 'submit',
                  'class' => 'Login'
                      ) );
                      
            $resgatar = new Zend_Form_Element_Hidden('resgatar');
            $resgatar->setDescription('<br/><a href="/resgatarsenha/admin">Esqueci a Senha</a>')
					->setDecorators(array(
						'ViewHelper',
						array('Description', array('escape' => false, 'tag' => false)),
					));

            $this->setMethod( 'POST' );
//            $this->setAction('/admin/');
            $this->addElements( array(
                  $username,
                  $senha,
                  $submit,
                  $resgatar
                      ) );
      }

}
