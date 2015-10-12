<?php
namespace Xanka\Slider\Controller\Adminhtml;

use Magento\Backend\App\Action;

class Slideshow extends \Magento\Backend\App\Action
{

	//protected $_coreRegistry = null;
	
   public function __construct(
	   \Magento\Backend\App\Action\Context $context
	// \Magento\Framework\Registry $coreRegistry
   )
    {
    //  $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }


    /**
     * Check for is allowed
     *
     * @return boolean
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Xanka_Slider::slideshow');
    }
}

