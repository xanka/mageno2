<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Xanka\Slider\Controller\Adminhtml\SlideshowData;
use Magento\Backend\App\Action;
use Magento\Framework\App\Filesystem\DirectoryList;
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
        $data1 = $this->getRequest()->getPostValue();
	
		
		 $mediaDirectory = $this->_objectManager->get('Magento\Framework\Filesystem')
                ->getDirectoryRead(DirectoryList::MEDIA); 
		 $result = $mediaDirectory->getAbsolutePath();
		
        if ($data1) {

            $id = $this->getRequest()->getParam('entity_id');
			
			$slideshowId = $this->getRequest()->getParam('slideshow_id');
			
            $model = $this->_objectManager->create('Xanka\Slider\Model\SlideshowData')->load($id);
			// new action
			if(!$id){
				$data1 = array();
				$form_key = $_POST['form_key'];
				$name = $_POST['name'];
				$slideshow_id = $_POST['slideshow_id'];
				$description = $_POST['description'];
				$active_all = $_POST['active_all'];
				$data1['form_key'] = $form_key;
				$data1['name'] = $name;
				$data1['slideshow_id'] = $slideshow_id;
				$data1['description'] = $description;
				$data1['active_all'] = $active_all;				
			}
			
			$modelSlideshow = $this->_objectManager->create('Xanka\Slider\Model\Slideshow')->load($slideshowId);
			
            if (!$model->getId() && $id) {
                $this->messageManager->addError(__('This block no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
			// check image2
			
				 
					   // image type file
					   if($_FILES['image']['type'] == "image/jpeg"
						|| $_FILES['image']['type'] == "image/png"
						|| $_FILES['image']['type'] == "image/gif"){
						  //   upload file 
							$path = $result;  // folder save image 
							  $tmp_name = $_FILES['image']['tmp_name'];
							  $name = $_FILES['image']['name'];
							  $type = $_FILES['image']['type']; 
								
							  move_uploaded_file($tmp_name,$path.$name);
								
						}else{
							$path = $result;  // folder save image 
							  $tmp_name = $_FILES['image']['tmp_name'];
							  $name = $_FILES['image']['name'];
						  $this->messageManager->addSuccess('image none');
						}
				 
			$data2 = array('image' => $path.$name);
			
			$data= array_merge($data2, $data1);
            // init model and set data
		
            $model->setData($data);
			//print_r($data);die();
            // try to save it
            try {
                // save the data
                $model->save();
                // display success message
                $this->messageManager->addSuccess(__('You saved the Slideshow Data.'));
                // clear previously saved data from session
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(true);

                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // save data in session
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                // redirect to edit form
                return $resultRedirect->setPath('*/*/edit', ['entity_id' => $this->getRequest()->getParam('entity_id')]);
            }
        }
        return $resultRedirect->setPath('*/*/');	
    }
}