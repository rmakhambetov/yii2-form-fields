<?php

namespace fgh151\fields\fields;

use yii\helpers\ArrayHelper;

abstract class BaseField extends \yii\base\Component
{
    public $options;

    public $class;

    /**
     * @var  Модель формы, связанная с виджетом
     */
    protected $form;

    /**
     * @var string Правила валидации
     */
    protected $attribute;

    /**
     * @var string Комментарий к полю
     */
    protected $comment;

    /**
     * @var string Метка или заголовок
     */
    public $label;

    public $value;

    public $model;

    public $name;

    /**
     * @var string Идентификатор виджета
     */
    public $id;

    /**
     * @var string Имя поля для выпадающего списка
     */
    protected $fieldSelectName;

    abstract public function render();

    /**
     * Возвращает массив всех доступных виджетов
     * @return array
     */
    public static function getAll()
    {
        return [];
    }

    /**
     * Создает экземпляр поля
     * @param string $type
     * @param array $properties
     * @return self
     * @throws \Exception
     */
    public static function create($type, $properties = [])
    {
        $class = static::resolveClassName($type);

        /** @var self $widget */
        $widget = new $class($properties);
        return $widget;
    }

    /**
     * Определяет имя класса для обработки поля
     * @param $type
     * @return string
     * @throws \Exception
     */
    protected static function resolveClassName($type)
    {
        $class = __NAMESPACE__ . '\\' . ucfirst($type);
        if (!class_exists($class)) {
            $class = __NAMESPACE__.'\Text';
        }
        return $class;
    }


    /**
     * Returns name of the form field for drop down list
     * @return mixed
     */
    public function getSelectName()
    {
        return $this->fieldSelectName;
    }

    /**
     * Производит инициализацию виджета
     */
    public function init()
    {

    }

}