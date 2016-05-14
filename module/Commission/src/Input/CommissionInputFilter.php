<?php
namespace Commission\Input;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Commission\Entity\Commission;
use Zend\InputFilter\FileInput;
use Zend\Filter\File\RenameUpload;

class CommissionInputFilter implements InputFilterAwareInterface
{

    protected $inputFilter;

    // Add content to these methods:
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    function getInputFilter()
    {
        $inputFilter = new InputFilter();

        $inputFilter->add(array(
            'name' => 'id',
            'required' => true,
            'filters' => array(
                array(
                    'name' => 'Int'
                )
            )
        ));

        $inputFilter->add(array(
            'name' => 'name',
            'required' => true,
            'filters' => array(
                array(
                    'name' => 'StripTags'
                ),
                array(
                    'name' => 'StringTrim'
                )
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100
                    )
                ),
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100
                    )
                )
            )
        ));

        $inputFilter->add(array(
            'name' => 'email',
            'required' => true,
            'filters' => array(
                array(
                    'name' => 'StripTags'
                ),
                array(
                    'name' => 'StringTrim'
                )
            ),
            'validators' => array(
                array(
                    'name' => \Zend\Validator\EmailAddress::class
                )
            )
        ));

        $inputFilter->add(array(
            'name' => 'species',
            'required' => true,
            'filters' => array(
                array(
                    'name' => 'StripTags'
                ),
                array(
                    'name' => 'StringTrim'
                )
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100
                    )
                )
            )
        ));

        $inputFilter->add(array(
            'name' => 'suit-type',
            'required' => true
        ));

        $inputFilter->add(array(
            'name' => 'request',
            'required' => true,
            'filters' => array(
                array(
                    'name' => 'StripTags'
                ),
                array(
                    'name' => 'StringTrim'
                )
            ),
            'validators' => array(
                array(
                    'name' => 'Alpha',
                    'options' => array(
                        'allowWhiteSpace' => true
                    )
                )
            )
        ));

        $renameFilter = new RenameUpload(array(
            'target' => "./data/upload/",
            'randomize' => true
        ));
        // File Input
        $fileInput = new FileInput('character-ref');
        $fileInput->setRequired(false);
        $fileInput->getFilterChain()->attach($renameFilter);
        $inputFilter->add($fileInput);
        return $inputFilter;
    }
}
