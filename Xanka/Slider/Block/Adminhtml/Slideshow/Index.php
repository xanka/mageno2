<?php
namespace Xanka\Slider\Block\Adminhtml\Slideshow;

use \Magento\Backend\Block\Widget\Container;
class Index extends \Magento\Backend\Block\Widget\Container
{	
	
	protected $_slideshowFactory;
	 protected $_coreRegistry = null;
	
	 public function __construct(
		 \Magento\Backend\Block\Widget\Context $context, 
		  \Magento\Framework\Registry $registry,
		\Xanka\Slider\Model\Resource\Slideshow\CollectionFactory $slideshowFactory,		
		array $data =[]		
	)
    {
		$this->_slideshowFactory = $slideshowFactory;
         $this->_coreRegistry = $registry;
      parent::__construct($context, $data);
	
    }
	
	 public function getModel(){
		 $models = $this->_coreRegistry->registry('slideshow_index');
		 return $models;
	 }

 
}