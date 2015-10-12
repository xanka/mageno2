<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Xanka\Slider\Model\Resource\Slideshow;

class Collection extends \Magento\Framework\Model\Resource\Db\Collection\AbstractCollection
{
		   /**
		 * Define model & resource model
		 */
		protected function _construct()
		{
			$this->_init(
				'Xanka\Slider\Model\Slideshow',
				'Xanka\Slider\Model\Resource\Slideshow'
			);
		}
}
