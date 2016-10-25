<?php

namespace fgh151\fields\fields;

class CheckboxListOther extends BaseField
{
    public $variants;
    public function render()
    {
        foreach ($this->variants as $variant) {
            echo BaseField::create('BinaryCheckbox', [
                'label' => $variant['label'],
                'value' => $variant['value'],
                'name' => $this->name
            ])->render();
        }
        echo BaseField::create('BinaryCheckbox', [
            'label' => 'other',
            'value' => 'other',
            'name' => $this->name
        ])->render();
        echo BaseField::create('text', [
            'label' => 'other',
            'value' => 'other',
            'name' => $this->name
        ])->render();
    }
}