<?php
/**
 * @link https://github.com/2amigos/yii2-switch-widget
 * @copyright Copyright (c) 2013-2015 2amigOS! Consulting Group LLC
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace dosamigos\switchinput;

use yii\helpers\Html;
use yii\widgets\InputWidget;

/**
 * SwitchBox renders a checkbox type toggle switch control. For example:
 *
 * ```
 * <?= \dosamigos\switchinput\SwitchBox::widget([
 *      'name' => 'Test',
 *      'clientOptions' => [
 *          'size' => 'large',
 *          'onColor' => 'success',
 *          'offColor' => 'danger'
 *      ]
 *  ]);?>
 * ```
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\switchinput
 */
class SwitchBox extends InputWidget
{
    use SwitchTrait;

    /**
     * @var bool whether to display the label inline or not. Defaults to true.
     */
    public $inlineLabel = true;

    /**
     * @inheritdoc
     */
    public function run()
    {

        if ($this->hasModel()) {
            $input = Html::activeCheckbox($this->model, $this->attribute, $this->options);
        } else {
            $input = Html::checkbox($this->name, $this->checked, $this->options);
        }
        echo $this->inlineLabel ? $input : Html::tag('div', $input);
        $this->selector = "#{$this->options['id']}";

        $this->registerClientScript();
    }
}
