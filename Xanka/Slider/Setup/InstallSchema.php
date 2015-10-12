<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Xanka\Slider\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();
		
        /**
         * Create table 'slideshow'
         */		
	
        $table = $installer->getConnection()
            ->newTable($installer->getTable('slideshow'))
            ->addColumn(
                'slideshow_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Slideshow ID'
            )       
            ->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                32,
                ['nullable' => false],
                'Name'
            )
            ->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                [],
                'Creation Time'
            )
            ->addColumn(
                'updated_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
				null,
                [],
                'Updatetion Time'
            )              
            ->setComment('Slideshow Table');
        $installer->getConnection()->createTable($table);

        /**
         * Create table 'slidewshow_data'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('slideshow_data'))
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Entity ID'
            )
            ->addColumn(
                'slideshow_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
				null,
				 ['nullable' => false],
                'Slideshow ID'
            )
             ->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                32,
                ['nullable' => false],
                'Name'
            )
			 ->addColumn(
                'image',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Image Url'
            )
			 ->addColumn(
                'description',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'Descripntion'
            )
			->addColumn(
            'created_time',
			\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
				null,
				[],
				'Creation Time'
			)->addColumn(
				'updated_time',
				\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
				null,
				[],
				'Modification Time'
			) 
			->addIndex(
				$installer->getIdxName('slideshow_data', ['entity_id']),
				['entity_id']
			)
				
            ->setComment('Slideshow Data Table');                 
        $installer->getConnection() ->createTable($table);
        $installer->endSetup();

    }
}
