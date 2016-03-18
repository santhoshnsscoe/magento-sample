<?php

namespace VendorName\SampleModule\Block\Adminhtml\Sample\Detail;

use \Magento\Backend\Block\Widget\Grid\Extended as ExtendGrid;
use Magento\Backend\Block\Template\Context;
use Magento\Backend\Helper\Data as BackendHelper;
use VendorName\SampleModule\Model\ResourceModel\Sample\CollectionFactory;

class Grid extends ExtendGrid {

    protected $_collectionFactory;

    public function __construct(Context $context, BackendHelper $backendHelper, CollectionFactory $collectionFactory, array $data = []) {
        $this->_collectionFactory = $collectionFactory;
        $this->_module = 'vendorname_samplemodule';
        parent::__construct($context, $backendHelper, $data);

        $this->setId('my_sample_grid');
        $this->setUseAjax(false);
        $this->setDefaultSort('updated_at');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection() {
        $collection = $this->_collectionFactory->create();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        $this->addColumn('sample_id', [
            'header' => __('ID'),
            'sortable' => true,
            'index' => 'sample_id',
                ]
        );
        $this->addColumn('text_column', [
            'header' => __('My Text'),
            'sortable' => true,
            'index' => 'text_column',
                ]
        );
        $this->addColumn('updated', [
            'header' => __('Updated'),
            'sortable' => true,
            'index' => 'updated',
                ]
        );
        $this->addColumn('updated_at', [
            'header' => __('Update On'),
            'sortable' => true,
            'index' => 'updated_at',
                ]
        );

        $this->addExportType('*/*/exportCsv', __('CSV'));
        $this->addExportType('*/*/exportExcel', __('Excel XML'));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction() {
        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('update_ids');
        $this->getMassactionBlock()->setUseSelectAll(false);

        $this->getMassactionBlock()->addItem('update', [
            'label' => __('Update Selected'),
            'url' => $this->getUrl('*/*/updateMassaction'),
        ]);

        return $this;
    }

    public function getRowUrl($row) {
        return $this->getUrl('*/*/edit', ['id' => $row->getId()]);
    }

}
