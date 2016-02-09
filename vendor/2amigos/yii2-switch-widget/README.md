# Bootstrap Switch Widget for Yii2

[![Latest Version](https://img.shields.io/github/tag/2amigos/yii2-switch-widget.svg?style=flat-square&label=release)](https://github.com/2amigos/yii2-switch-widget/tags)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/2amigos/yii2-switch-widget/master.svg?style=flat-square)](https://travis-ci.org/2amigos/yii2-switch-widget)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/2amigos/yii2-switch-widget.svg?style=flat-square)](https://scrutinizer-ci.com/g/2amigos/yii2-switch-widget/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/2amigos/yii2-switch-widget.svg?style=flat-square)](https://scrutinizer-ci.com/g/2amigos/yii2-switch-widget)
[![Total Downloads](https://img.shields.io/packagist/dt/2amigos/yii2-switch-widget.svg?style=flat-square)](https://packagist.org/packages/2amigos/yii2-switch-widget)

Renders a [Bootstrap Toggle Switch plugin](http://www.bootstrap-switch.org/) widget.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ composer require 2amigos/yii2-switch-widget:~1.0
```

or add

```
"2amigos/yii2-switch-widget": "~1.0"
```

to the `require` section of your `composer.json` file.

## Usage

The widget comes in two flavors:

- SwitchBox
- SwitchRadio

**SwitchBox**

This widget renders a Bootstrap Toggle Switch Checkbox input control. Best suitable for attributes with boolean states (on|off, true|false, 1|0) when used with model.

***Example of use with a form***

```
<?php
use dosamigos\switchinput\SwitchBox;
?>

<?= $form->field($model, 'validated')->widget(SwitchBox::className(),[
	'clientOptions' => [
		'size' => 'large',
		'onColor' => 'success',
		'offColor' => 'danger'
	]
]);?>
```
***Example of use without a model***

```
<?= \dosamigos\switchinput\SwitchBox::widget([
	'name' => 'Test',
	'checked' => true,
	'clientOptions' => [
		'size' => 'large',
		'onColor' => 'success',
		'offColor' => 'danger'
	]
]);?>
```
**SwitchRadio**

This widget renders a Bootstrap Toggle Switch Checkbox radio list control. Best suitable for attributes with multiple states when used with a model.

***Example of use with a form***

```
<?php
use dosamigos\switchinput\SwitchRadio;
?>
<?= $form->field($model, 'status')->widget(SwitchRadio::className(), [
	'items' => [
		20 => 'rejected',
		40 => 'approved',
		50 => 'on hold'
	],
]);?>
```
***Example of use without a model***

```
<?= \dosamigos\switchinput\SwitchRadio::widget([
	'name' => 'shape',
	'inline' => false,
	'items' => [
		[
			'label' => 'best',
			'value' => 100,
			'options' => ['data-size' => 'mini']
		],
		20 => 'good',
		40 => 'superior',
		50 => 'master'
	],
	'labelOptions' => ['style' => 'font-size:16px']
]);?>
```

## Testing

```bash
$ ./vendor/bin/phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Antonio Ramirez](https://github.com/tonydspaniard)
- [Alexander Kochetov](https://github.com/creocoder)
- [All Contributors](https://github.com/2amigos/yii2-selectize-widget/graphs/contributors)

## License

The BSD License (BSD). Please see [License File](LICENSE.md) for more information.

<blockquote>
    <a href="http://www.2amigos.us"><img src="http://www.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0.png"></a><br>
    <i>web development has never been so fun</i><br>
    <a href="http://www.2amigos.us">www.2amigos.us</a>
</blockquote>
