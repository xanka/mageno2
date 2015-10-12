<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

// @codingStandardsIgnoreFile

namespace Xanka\Slider\Model\Resource;

 use \Magento\Framework\Model\Resource\Db\AbstractDb;
 
class SlideshowData extends AbstractDb
{
   /**
     * Define main table
     */
	// public function __construct(
  //      \Magento\Framework\Model\Resource\Db\Context $context
//		) {
 //       parent::__construct($context);     
//    }
    protected function _construct()
    {
        $this->_init('slideshow_data', 'entity_id');
    }
}
