<?php
namespace fgh151\fields\fields;

class RadioList extends BaseField
{
    public $variants;
    public function render()
    {
        foreach ($this->variants as $variant) {
            echo BaseField::create('BinaryRadio', [
                'label' => $variant['label'],
                'value' => $variant['value'],
                'name' => $this->name
            ])->render();
        }
    }
}