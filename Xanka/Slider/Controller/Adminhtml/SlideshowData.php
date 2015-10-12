<?php
namespace Xanka\Slider\Controller\Adminhtml;

use Magento\Backend\App\Action;

/**
 * Catalog product controller
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
class SlideshowData extends \Magento\Backend\App\Action
{

    public function __construct(
        \Magento\Backend\App\Action\Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * Check for is allowed
     *
     * @return boolean
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Xanka_Slider::slideshowdata');
    }
}

