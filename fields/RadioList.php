<?php

namespace fgh151\fields\fields;

use yii\helpers\Html;

class RadioList extends BaseField
{
    public $variants;
    public $htmlType = 'radio';

    public function render()
    {
        if (!empty($this->label)) {
            echo Html::label($this->label, $this->attribute);
        }
        
        foreach ($this->variants as $variant) {
            echo BaseField::create('BinaryRadio', [
                'label' => $variant['label'],
                'value' => $variant['value'],
                'name' => $this->name
            ])->render();
        }
    }
}
