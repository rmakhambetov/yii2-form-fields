<?php
namespace fgh151\fields\fields;
use yii\helpers\BaseHtml;
use yii\helpers\Html;

/**
 * Class Text Отображает text area
 */
class Number extends Text
{
    protected $htmlType = 'number';

    /**
     * @inheritdoc
     */
    protected $fieldSelectName = 'поле для ввода целого числа';

}
