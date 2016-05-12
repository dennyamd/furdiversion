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
use Commission\File\FileWork;
use Commission\Mail\Mail;

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
        $form->setInputFilter((new CommissionInputFilter())->getInputFilter());
        $tempFile = null;

        $prg = $this->fileprg($form);

        if ($prg instanceof \Zend\Http\PhpEnvironment\Response) {
            // Return PRG redirect response
            return $prg;
        } elseif (is_array($prg)) {
            if ($form->isValid()) {

                $data = $form->getData();

                $commission = (new CommissionOutput())->getCommission($data);
                $id = $this->repository->saveCommission($commission);

                (new FileWork())->saveFile($id, $data['character-ref']);

                (new Mail())->sendMail($data);

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
