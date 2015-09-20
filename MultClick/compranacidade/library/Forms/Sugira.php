<?php

class Forms_Sugira extends Zend_Form
{

      public function init()
      {
            $localidade = new Zend_Form_Element_Text( 'localidade' );
            $localidade->setLabel('Localidade')
				 ->setAttribs(array('style' => 'width: 300px;'))
				 ->setRequired();

            $submit = new Zend_Form_Element_Button( 'Enviar' );
            $submit->setAttribs( array(
                  'type' => 'submit',
                  'class' => 'Enviar'
                      ) );

            $this->setAction( '' );
            $this->setAttribs(array('class'=>'localidadeForm'));
            $this->setMethod( Zend_Form::METHOD_POST );
            $this->addElements( array(
                  $localidade,
                  $submit,
                      ) );
      }

}