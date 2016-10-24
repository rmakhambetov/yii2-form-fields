<?php
namespace fgh151\fields\fields;
use yii\helpers\Html;

/**
 * Class Text Отображает text area
 */
class Text extends BaseField
{
    /**
     * @inheritdoc
     */
    protected $fieldSelectName = 'поле для ввода большого текста';

    /**
     * @inheritdoc
     */
    public function render()
    {
        $content = Html::label($this->form, $this->attribute);
        $content .= Html::label($this->form, $this->attribute, ['class' => 'custom-text']);

        if ($this->comment) {
            $content .= Html::tag('div', ['class' => 'comment'], $this->comment);
        }

        return Html::tag('div', ['class' => 'upload-item'], $content);
    }
}
