<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Xanka\Slider\Controller\Adminhtml\SlideshowData;

class Index extends \Xanka\Slider\Controller\Adminhtml\SlideshowData
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
		/*
		*	get all object and create model
		*/
		$model = $this->_objectManager->get("Xanka\Slider\Model\SlideshowData")->getCollection();
		
		/** set doi tuong ra block*/
		 $this->_coreRegistry->register('slideshowdata_index', $model);
		
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
		
        /**$resultPage->setActiveMenu('Xanka_Slider::xanka_slider'); */
        $resultPage->getConfig()->getTitle()->prepend(__('Slideshow Data'  ));
        return $resultPage;		
    }
	
}