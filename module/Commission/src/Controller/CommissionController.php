<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Commission for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Commission\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Commission\Form\CommissionForm;
use Commission\Input\CommissionInputFilter;
use Commission\Repository\CommissionRepository;
use Commission\Output\CommissionOutput;

class CommissionController extends AbstractActionController
{

    protected $repository;

    public function setRepository(CommissionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function indexAction()
    {
        return array();
    }

    public function thankYouAction()
    {
        return array();
    }

    public function addAction()
    {
        $form = new CommissionForm();

        $request = $this->getRequest();

        if ($request->isPost()) {

            $inputFilter = new CommissionInputFilter();
            $form->setInputFilter($inputFilter->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $output = new CommissionOutput();

                $commission = $output->getCommission($form->getData());
                $this->repository->saveCommission($commission);

                // Redirect to list of albums
                return $this->redirect()->toRoute('thank_you');
            }
        }

        return array(
            'form' => $form
        );
    }
}
