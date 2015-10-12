<?php
namespace Xanka\Slider\Block\Adminhtml\SlideshowData\SlideshowData;

use \Magento\Backend\Block\Widget\Container;
class Edit extends \Magento\Backend\Block\Widget\Container
{	
	
	protected $_slideshowDataFactory;
	 protected $_coreRegistry = null;
	protected $_slideshowFactory;
	
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

	 public function getModelEdit(){
		 $models = $this->_coreRegistry->registry('slideshowdata_edit');
		 return $models;
	 }
	  public function getSlideshow( $slideshowdataid) { 		
		
		if($slideshowdataid){
			
			return   $this->_slideshowFactory->create() ->load($slideshowdataid);	
		}
		else{
			
			return   $this->_slideshowFactory->create() ->getCollection();
		}
		
	}

 
}