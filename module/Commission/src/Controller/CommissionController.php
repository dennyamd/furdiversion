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
use Commission\Repository\CommissionRepository;
use Commission\Output\CommissionOutput;
use Zend\View\Model\ViewModel;
use Commission\Input\CommissionInputFilter;

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
        $request = $this->getRequest();
        var_dump($request->getQuery('id'));
        exit();
        return array();
    }

    public function addAction()
    {
        $form = new CommissionForm();
        $tempFile = null;

        $prg = $this->fileprg($form);

        if ($prg instanceof \Zend\Http\PhpEnvironment\Response) {
            return $prg; // Return PRG redirect response
        } elseif (is_array($prg)) {
            $form->setInputFilter((new CommissionInputFilter())->getInputFilter());
            if ($form->isValid()) {
                $output = new CommissionOutput();

                $commission = $output->getCommission($prg);
                $id = $this->repository->saveCommission($commission);

                $view = new ViewModel();
                $view->setTemplate('commission/commission/thank_you');
                $view->setVariables($prg);
                return $view;
            } else {
                // Form not valid, but file uploads might be valid...
                // Get the temporary file information to show the user in the view
                $fileErrors = $form->get('character-ref')->getMessages();
                if (empty($fileErrors)) {
                    $tempFile = $form->get('character-ref')->getValue();
                }
            }
        }
        return array(
            'form' => $form,

            'characterRefFile' => $tempFile
        );
    }
}
