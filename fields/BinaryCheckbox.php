<?php

namespace fgh151\fields\fields;

use yii\helpers\Html;
use yii\helpers\BaseHtml;

class BinaryCheckbox extends BaseField
{
    public $htmlType = 'checkbox';
    public function render()
    {
        $content = '';
        $textInput = BaseHtml::checkbox(
            $this->name,
            $this->value,
            $this->options
        );


        if ($this->comment) {
            $content = Html::tag('div', ['class' => 'comment'], $this->comment);
        }


        $label = Html::tag('label', $textInput. "\n" .$this->label. "\n".$this->comment. "\n" . $content);

        return Html::tag('div', $label, ['class' => 'checkbox']);
    }
}