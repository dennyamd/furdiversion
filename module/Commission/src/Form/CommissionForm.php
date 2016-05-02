<?php
namespace Commission\Form;

use Zend\Form\Form;

class CommissionForm extends Form
{

    public function __construct($name = null)
    {
        parent::__construct("Commission");
        
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden'
        ));
        $this->add(array(
            'name' => 'name',
            'type' => 'Text',
            'options' => array(
                'label' => 'First Name: '
            )
        ));
        $this->add(array(
            'name' => 'email',
            'type' => 'Zend\Form\Element\Email',
            'options' => array(
                'label' => 'Email: '
            )
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Add',
                'id' => 'submitbutton'
            )
        ));
    }
}