<?php

namespace fgh151\fields;

use fgh151\fields\fields\BaseField;
use fgh151\fields\fields\FieldTypes;
use yii\helpers\BaseHtml;
use \yii\widgets\InputWidget as YiiInputWidget;

/**
 * This is just an example.
 */
class InputWidget extends YiiInputWidget
{
    public $type = 'text';

    public $options = [];

    public $attribute;

    public function run()
    {
        $name = isset($this->options['name']) ? $this->options['name'] : BaseHtml::getInputName($this->model, $this->attribute);
        $value = isset($this->options['value']) ? $this->options['value'] : BaseHtml::getAttributeValue($this->model, $this->attribute);
        $label = isset($this->options['label']) ? $this->options['label'] : $this->model->getAttributeLabel($this->attribute);
        if (!array_key_exists('id', $this->options)) {
            $options['id'] = BaseHtml::getInputId($this->model, $this->attribute);
        }

        $this->options['name'] = $name;
        $this->options['value'] = $value;
        $this->options['label'] = $label;

        $types = FieldTypes::getTypes();

        $field = BaseField::create($types[$this->type], $this->options);
        $field->registerAssets($this->getView());

        return $field->render();

    }
}
