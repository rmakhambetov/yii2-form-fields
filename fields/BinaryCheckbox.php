<?php

namespace fgh151\fields\fields;

use yii\helpers\Html;
use yii\helpers\BaseHtml;

class BinaryCheckbox extends BaseField
{
    public function render()
    {
        $content = '';
        $label = Html::label($this->label, $this->attribute);
        $textInput = BaseHtml::checkbox(
            $this->name,
            $this->value,
            $this->options
        );


        if ($this->comment) {
            $content = Html::tag('div', ['class' => 'comment'], $this->comment);
        }

        return Html::tag('div',$label . "\n" . $textInput . "\n" . $content, ['class' => 'checkbox']);
    }
}