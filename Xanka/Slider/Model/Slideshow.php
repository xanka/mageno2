<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Xanka\Slider\Model;


class Slideshow extends \Magento\Framework\Model\AbstractModel
{
	    protected function _construct()
		{
			$this->_init('Xanka\Slider\Model\Resource\Slideshow');
		}
		
}
