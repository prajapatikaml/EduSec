<?php
class export extends CWidget{

    public static function actions(){
        return array(
                   // naming the action and pointing to the location
                   // where the external action class is
           'exportExcel'=>'application.components.actions.exportExcel',
	   'exportPDF'=>'application.components.actions.exportPDF',
        );
    }
}
?>
