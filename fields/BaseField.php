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
    protected $label;

    /**
     * @var string Идентификатор виджета
     */
    private $id;

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
     * @param  $form
     * @param string $type
     * @param string $name
     * @param string $label
     * @param string $required
     * @param array $properties
     * @return self
     * @throws \Exception
     */
    public static function create($form, $type, $name, $label, $required = null, $properties = [])
    {
        $class = static::resolveClassName($type);

        /** @var self $widget */
        $widget = new $class();

        $config = static::makeConfig([
            'form' => $form,
            'attribute' => $name,
            'label' => $label,
            'required' => $required
        ], $properties);


        static::configure($widget, $config);

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
        $class = ucfirst($type);
        if (!file_exists(__DIR__ . DIRECTORY_SEPARATOR . $class . '.php')) {
            throw new \Exception("Поле для заявок на спецпроекты {$type} не допустимо");
        }
        return __NAMESPACE__ . '\\' . $class;
    }

    /**
     * Формирует конфигурацию для поля ввода
     * @param array $baseConfig Базовая конфигурация виджета
     * @param array $properties Настройки
     * @return array
     */
    protected static function makeConfig(array $baseConfig, $properties)
    {
        return ArrayHelper::merge($baseConfig, $properties);
    }

    /**
     * Конфигурирует и иницилизирует виджет
     * @param BaseField $widget
     * @param array $config
     */
    protected static function configure(self $widget, array $config)
    {
        foreach ($config as $param => $value) {
            if (!property_exists($widget, $param)) {
                continue;
            }

            $widget->$param = $value;
        }

        $widget->init();
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