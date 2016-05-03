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
                'label' => 'Name: '
            ),
            'attributes' => array(
                'placeholder' => 'First Name'
            )
        ));
        $this->add(array(
            'name' => 'email',
            'type' => 'Zend\Form\Element\Email',
            'options' => array(
                'label' => 'Email: '
            ),
            'attributes' => array(
                'placeholder' => 'Email'
            )
        ));
        $this->add(array(
            'name' => 'species',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Species: '
            ),
            'attributes' => array(
                'placeholder' => 'Character Species'
            )
        ));

        $this->add(array(
            'name' => 'request',
            'type' => 'Zend\Form\Element\Textarea',
            'options' => array(
                'label' => 'Request: '
            ),
            'attributes' => array(
                'rows' => 10,
                'cols' => 60,
                'placeholder' => 'Describe Your Commission Request'
            )
        ));

        // Submit
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