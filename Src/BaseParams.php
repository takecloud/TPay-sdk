<?php
/**
 * User: Roki
 * Date: 2019/11/21
 * Time: 11:35
 */

namespace TPay;

/**
 * Class BaseParams
 * @package TPay
 */
class BaseParams
{
    protected $data = [];

    protected $mandatoryFields = [];

    /**
     * 校验必填字段
     * @throws ParamsException
     */
    public function validateMandatoryFields()
    {
        foreach ($this->mandatoryFields as $field) {
            if (!isset($this->data[$field])) {
                throw new ParamsException($field . ' 为必填字段');
            }
        }
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getMandatoryFields()
    {
        return $this->mandatoryFields;
    }

    /**
     * @param array $mandatoryFields
     */
    public function setMandatoryFields($mandatoryFields)
    {
        $this->mandatoryFields = $mandatoryFields;
    }

}