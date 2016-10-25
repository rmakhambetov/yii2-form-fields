<?php

namespace fgh151\fields\fields;

use yii\web\View;

class CheckboxListOther extends BaseField
{
    public $variants;

    private $_checkboxId;
    private $_textId;

    /**
     * Initialize ids
     */
    public function init()
    {
        $this->_checkboxId = $this->id.'-other';
        $this->_textId = $this->_checkboxId.'-text';
        parent::init();
    }

    /**
     * Render elements
     */
    public function render()
    {

        foreach ($this->variants as $variant) {
            echo BaseField::create('BinaryCheckbox', [
                'label' => $variant['label'],
                'value' => $variant['value'],
                'name' => $this->name,
                'id' => $this->options['id'].'-'.time()
            ])->render();
        }

        $otherCheckbox = BaseField::create('BinaryCheckbox', [
            'label' => 'other',
            'value' => false,
            'name' => $this->name,
            'id' => $this->_checkboxId
        ]);
        echo $otherCheckbox->render();

        $otherText = BaseField::create('text', [
            'label' => 'other',
            'value' => 'other',
            'name' => $this->name,
            'id' => $this->_textId,
            'style' => 'display: none;'
        ]);
        echo $otherText->render();
    }

    /**
     * Register js handlers
     * @param View $view
     */
    public function registerAssets($view)
    {
        $view->registerJs(
            '$("#'.$this->_checkboxId.'").click(function(){$("#'.$this->_textId.'").parent().toggle()})'
        );
        parent::registerAssets($view);
    }
}