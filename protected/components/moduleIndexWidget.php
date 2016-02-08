<?php

class moduleIndexWidget extends CWidget
{
    public static function actions(){
        return array(
           'indexPage'=>'application.components.actions.indexPage',
        );
    }
}
