<?php
namespace Xanka\Slider\Block\Adminhtml\SlideshowData;

use \Magento\Backend\Block\Widget\Container;
class Index extends \Magento\Backend\Block\Widget\Container
{	
	
	protected $_slideshowDataFactory;
	protected $_slideshowFactory;
	 protected $_coreRegistry = null;
	
	 public function __construct(
		 \Magento\Backend\Block\Widget\Context $context, 
		  \Magento\Framework\Registry $registry,
		\Xanka\Slider\Model\Resource\SlideshowData\CollectionFactory $slideshowDataFactory,
		\Xanka\Slider\Model\SlideshowFactory $slideshowFactory,		
		array $data =[]		
	)
    {
		$this->_slideshowDataFactory = $slideshowDataFactory;
		$this->_slideshowFactory = $slideshowFactory;
         $this->_coreRegistry = $registry;
      parent::__construct($context, $data);
	
    }
	
	 public function getModel(){
		 $models = $this->_coreRegistry->registry('slideshowdata_index');
		 return $models;
	 }
	 public function getSlideshowById($slideshowId) { 	
		
		return $this->_slideshowFactory->create() ->load($slideshowId);				 
	}
}