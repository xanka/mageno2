<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Xanka\Slider\Controller\Adminhtml\Slideshow;
use Magento\Backend\App\Action;
class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
	protected $_coreRegistry = null;
	
    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Catalog\Controller\Adminhtml\Product\Builder $productBuilder
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
	public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry	
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        parent::__construct($context);
    }

    /**
     * Product list page
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
		 $resultRedirect = $this->resultRedirectFactory->create();
        // check if data sent
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('slideshow_id');			
            $model = $this->_objectManager->create('Xanka\Slider\Model\Slideshow') -> load($id) ;			
			if(!$id){
				$name = $_POST['name'];
				$save = 'save';
				$form_key = $_POST['form_key'];
				$data = array();
				$data['name'] =	$name;
				$data['save'] =	$save;
				$data['form_key'] =	$form_key;				
			}
			$model->setData($data);
			
            // init model and set data
			
            // try to save it
            try {
                // save the data
                $model->save();
                // display success message
                $this->messageManager->addSuccess(__('You saved the Slideshow.'));
                // clear previously saved data from session
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);

                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // save data in session
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                // redirect to edit form
                return $resultRedirect->setPath('*/*/edit', ['slideshow_id' => $this->getRequest()->getParam('slideshow_id')]);
            }
        }
        return $resultRedirect->setPath('*/*/');	
    }
}