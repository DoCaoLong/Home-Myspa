<?php


class ImportProductAttrition
{
    /** @var CI_Controller */
    private $_CI;

    function __construct() {
        $this->_CI = &get_instance();
        $this->_CI->load->model('Fast_accounting_model');

        Events::register('Import::ProductAttrition', [$this, 'handler']);
    }

    function handler($data)
    {
        if (isset($data['fast_service_id'])) {
            $this->_CI->Fast_accounting_model->createOrUpdate([
                'fast_id' => $data['fast_service_id'],
                'model_id' => $data['service_id'],
                'model_type' => Fast_accounting_model::MODEL_TYPE_SERVICE,
            ]);
        }

        if (isset($data['fast_product_attrition_id'])) {
            $this->_CI->Fast_accounting_model->createOrUpdate([
                'fast_id' => $data['fast_product_attrition_id'],
                'model_id' => $data['product_attrition_id'],
                'model_type' => Fast_accounting_model::MODEL_TYPE_PRODUCT_ATTRITION,
            ]);
        }
    }
}