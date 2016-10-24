<?php
namespace fgh151\fields\fields;
use yii\helpers\BaseHtml;
use yii\helpers\Html;

/**
 * Class Text Отображает text area
 */
class Email extends Text
{
    protected $htmlType = 'email';

    /**
     * @inheritdoc
     */
    protected $fieldSelectName = 'поле для ввода email';

}
