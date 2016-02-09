<?php
/**
 * @link https://github.com/2amigos/yii2-switch-widget
 * @copyright Copyright (c) 2013-2015 2amigOS! Consulting Group LLC
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace dosamigos\switchinput;

use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * SwitchTrait holds common attributes and methods for both [[SwitchBox]] and [[SwitchRadio]]
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\switchinput;
 */
trait SwitchTrait
{
    /**
     * @var bool specifies whether the checkbox should be checked or unchecked, when not used with a model. If [[items]],
     * [[$checked]] will specify the value to select.
     */
    public $checked = false;
    /**
     * @var array the options for the Bootstrap Switch 3 plugin.
     * Please refer to the Bootstrap Switch 3 plugin Web page for possible options.
     * @see http://www.bootstrap-switch.org/
     */
    public $clientOptions = [];
    /**
     * @var array the event handlers for the underlying Bootstrap Switch 3 input JS plugin.
     * Please refer to the [Bootstrap Switch 3](http://www.bootstrap-switch.org/) plugin
     * Web page for possible events.
     */
    public $clientEvents = [];
    /**
     * @var string the DOM element selector
     */
    protected $selector;

    /**
     * Registers Bootstrap Switch plugin and related events
     */
    public function registerClientScript()
    {
        $view = $this->view;
        SwitchAsset::register($view);

        $this->clientOptions['animate'] = ArrayHelper::getValue($this->clientOptions, 'animate', true);
        $options = Json::encode($this->clientOptions);

        $js[] = ";jQuery('$this->selector').bootstrapSwitch($options);";
        if (!empty($this->clientEvents)) {
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = "jQuery('$this->selector').on('$event', $handler);";
            }
        }
        $view->registerJs(implode("\n", $js));
    }
}
