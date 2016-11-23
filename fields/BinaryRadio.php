<?php

namespace fgh151\fields\fields;

use yii\helpers\Html;
use yii\helpers\BaseHtml;

class BinaryRadio extends BaseField
{
    public $htmlType = 'radio';
    public function render()
    {
        $content = '';
        $textInput = BaseHtml::radio(
            $this->name,
            $this->value,
            $this->options
        );


        if ($this->comment) {
            $content = Html::tag('div', ['class' => 'comment'], $this->comment);
        }


        $label = Html::tag('label', $textInput. "\n" .$this->label. "\n".$this->comment. "\n" . $content);

        return Html::tag('div', $label, ['class' => 'radio']);
    }
}