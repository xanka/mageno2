<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Xanka\Slider\Model;

use Magento\Framework\Model\AbstractModel;

class SlideshowData extends AbstractModel 
{
	    protected function _construct()
		{
			$this->_init('Xanka\Slider\Model\Resource\SlideshowData');
		}
		
}
