<?php

namespace fgh151\fields\fields;

use yii\helpers\Html;
use yii\helpers\BaseHtml;

class BinaryRadio extends BaseField
{
    public function render()
    {
        $content = '';
        $label = Html::label($this->label, $this->attribute);
        $textInput = BaseHtml::radio(
            $this->name,
            $this->value,
            $this->options
        );


        if ($this->comment) {
            $content = Html::tag('div', ['class' => 'comment'], $this->comment);
        }

        return Html::tag('div',$label . "\n" . $textInput . "\n" . $content, ['class' => 'radio']);
    }
}