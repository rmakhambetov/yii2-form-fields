Yii2 form fields
================
Collection of form fields

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist fgh151/yii2-form-fields "*"
```

or add

```
"fgh151/yii2-form-fields": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
$form = ActiveForm::begin();
echo \fgh151\fields\InputWidget::widget([
    'model' => $model,
    'attribute' => 'attributeName',
    'type' => \fgh151\fields\FieldTypes::getByName('text'), //default text
]);
ActiveForm::end();
```

Input without model

```php
echo \fgh151\fields\InputWidget::widget([
    'model' => new \yii\base\DynamicModel(['attributeName']),
    'attribute' => 'attributeName',
]);
```

Input with custom label and value

```php
echo \fgh151\fields\InputWidget::widget([
    'model' => new \yii\base\DynamicModel(['attributeName']),
    'attribute' => 'attributeName',
    'options' => [
                'label' => 'Custom label',
                'value' => 'Some value',
    ]
]);
```

Available field types: 
* text
* email
* number
* textarea
* binaryCheckbox
* checkboxList

BinaryCheckbox - is binary field, for example agree field

#### Field type examples
##### chackboxList

```php
echo \fgh151\fields\InputWidget::widget([
    'model' => new \yii\base\DynamicModel(['FirstName']),
    'attribute' => 'FirstName',
    'type' => 6, //You can specify direct see \fgh151\fields\FieldTypes
    'options' => [
        'variants' => [
            ['label' => 'var1', 'value' => 'var1'],
            ['label' => 'var2', 'value' => 'var2'],
            ['label' => 'var3', 'value' => 'var3'],
        ]
    ]
]);
```
