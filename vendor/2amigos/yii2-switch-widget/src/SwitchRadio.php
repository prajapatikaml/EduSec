<?php
/**
 * @link https://github.com/2amigos/yii2-switch-widget
 * @copyright Copyright (c) 2013-2015 2amigOS! Consulting Group LLC
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace dosamigos\switchinput;

use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\InputWidget;

/**
 * SwitchRadio renders a radio control list. Examples of use:
 *
 * - with model:
 *
 * ```
 * <?php
 *  use dosamigos\switchinput
 *  ?>
 * <?= $form->field($model, 'status')->widget(SwitchRadio::className(), [
 *      'items' => [
 *          20 => 'Superb',
 *          40 => 'Wonderful',
 *          50 => 'Amazing'
 *      ],
 *  ]);?>
 *
 * ```
 *
 * - without model:
 *
 * ```
 *  SwitchRadio::widget([
 *      'name' => 'second test',
 *      'inline' => false,
 *      'items' => [
 *          [
 *              'label' => 'best',
 *              'value' => 100,
 *              'options' => ['data-size' => 'mini']
 *          ],
 *          20 => 'Superb',
 *      ],
 *      'labelOptions' => ['style' => 'font-weight:bold']
 *  ]);?>
 *
 * ```
 *
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\switchinput
 */
class SwitchRadio extends InputWidget
{
    use SwitchTrait;

    /**
     * @var bool whether to display the options inline. Defaults to true.
     */
    public $inline = true;
    /**
     * @var array the radio button options to render. The syntax is:
     * ```
     *  'items' => [
     *      [
     *          'label' => 'Label of item',
     *          'value' => 20,
     *          'options' => [],
     *          'labelOptions' => []
     *      ]
     * ]
     * ```
     * - label: string the label of item. If empty, will not be displayed.
     * - value: string the value of the item.
     * - options: HTML attributes of the item.
     * - labelOptions: HTML attributes of the label.
     *
     * You can also specify items like this:
     * ```
     *  'items' => [
     *      10 => 'Label of Item',
     *      [
     *          // ...
     *      ]
     *  ]
     * ```
     * On this case, the key of the array will be used as a value and the value of the array as a label.
     */
    public $items = [];
    /**
     * @var array HTML attributes common to each items' label
     */
    public $labelOptions = [];
    /**
     * @var string the separator content between each radio item
     */
    public $separator = " &nbsp;";
    /**
     * @var array HTML attributes for the radio group container
     */
    public $containerOptions = [];

    /**
     * @inheritdoc
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();

        if (empty($this->items) || !is_array($this->items)) {
            throw new InvalidConfigException('"$items" cannot be empty and must be of type array');
        }

        $name = $this->hasModel() ? Html::getInputName($this->model, $this->attribute) : $this->name;
        $this->selector = "input:radio[name=\"$name\"]";
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $items = [];
        foreach ($this->items as $key => $item) {
            if (!is_array($item)) {
                $options = $this->options;
                $options['value'] = $key;
                $options['label'] = $item;
                $options['labelOptions'] = $this->labelOptions;
            } else {
                $options = ArrayHelper::getValue($item, 'options', []) + $this->options;
                $options['value'] = ArrayHelper::getValue($item, 'value');
                $options['label'] = ArrayHelper::getValue($item, 'label', false);
                $options['labelOptions'] = ArrayHelper::getValue($item, 'labelOptions', []) + $this->labelOptions;
            }
            if ($this->inline) {
                $options['container'] = '';
            }
            $items[] = $this->hasModel() ? Html::activeRadio($this->model, $this->attribute, $options)
                : Html::radio($this->name, $this->checked, $options);
        }
        $this->containerOptions['class'] = ArrayHelper::getValue($this->containerOptions, 'class', 'form-group');
        echo Html::tag('div', implode($this->separator, $items), $this->containerOptions);

        $this->registerClientScript();
    }
}
