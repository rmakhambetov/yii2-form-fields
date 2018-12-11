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

        $wrapInput = $this->options['wrapInput'] ?? true;
        $labelOptions = $this->options['labelOptions'] ?? [];
        if (!isset($labelOptions['for'])) {
            $labelOptions['for'] = $this->options['id'];
        }

        if ($wrapInput) {
            $output = Html::tag('label', $textInput. "\n" .$this->label. "\n".$this->comment. "\n" . $content, $labelOptions);
        } else {
            $output = $textInput . Html::tag('label', "\n" .$this->label. "\n".$this->comment. "\n" . $content, $labelOptions);
        }

        return Html::tag('div', $output, $this->options['wrapperOptions'] ?? ['class' => 'checkbox']);
    }
}
