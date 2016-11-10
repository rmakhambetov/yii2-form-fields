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
* text - input type text
* email - input type email
* number - input type number
* textarea - text area
* binaryCheckbox - single check box (for example agree field)
* checkboxList - list check boxes with same name
* checkboxListOther - list check boxes with same name and input text field
* binaryRadio - single radio button
* radioList - list of radio buttons
* radioListOther - list of radio boxes with other text field
* file - file input field

BinaryCheckbox - is binary field, for example agree field

#### Field type examples
##### checkboxList, checkboxListOther, radioList, radioListOther

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
