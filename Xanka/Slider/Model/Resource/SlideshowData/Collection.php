<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Xanka\Slider\Model\Resource\SlideshowData;

use  \Magento\Framework\Model\Resource\Db\Collection\AbstractCollection;
class Collection extends AbstractCollection
{
		   /**
		 * Define model & resource model
		 */
		protected function _construct()
		{
			$this->_init(
				'Xanka\Slider\Model\SlideshowData',
				'Xanka\Slider\Model\Resource\SlideshowData'
			);
		}
}
