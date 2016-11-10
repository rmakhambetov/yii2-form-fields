<?php

namespace fgh151\fields\fields;

use yii\helpers\Html;

class File extends BaseField
{
    protected $htmlType = 'file';

    /**
     * @inheritdoc
     */
    protected $fieldSelectName = 'поле для загрузки файла';

    public function render()
    {
        $content = '';
        $label = Html::label($this->label, $this->attribute);

        $textInput = Html::input(
            $this->htmlType,
            $this->name,
            $this->value,
            $this->options
        );

        if ($this->comment) {
            $content = Html::tag('div', ['class' => 'comment'], $this->comment);
        }

        return Html::tag('div',$label . "\n" . $textInput . "\n" . $content, [
            'class' => 'upload-item',
            'style' => $this->style
        ]);
    }
}