<?php
namespace fgh151\fields\fields;

class CheckboxList extends BaseField
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
    }
}