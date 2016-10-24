<?php
namespace fgh151\fields\fields;

use yii\helpers\BaseHtml;
use yii\helpers\Html;

class Textarea extends BaseField
{
    private $htmlType = 'textarea';

    public function render()
    {

        $content = '';
        $label = Html::label($this->label, $this->attribute);

        $textInput = BaseHtml::tag(
            $this->htmlType,
            $this->value,
            [
                'class' => 'form-control ' . $this->class,
                'name' => $this->name
            ]
        );

        if ($this->comment) {
            $content = Html::tag('div', ['class' => 'comment'], $this->comment);
        }

        return Html::tag('div',$label . "\n" . $textInput . "\n" . $content, ['class' => 'upload-item']);
    }
}