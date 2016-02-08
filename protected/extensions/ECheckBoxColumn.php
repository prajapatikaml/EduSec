<?php
 
class ECheckBoxColumn extends CCheckBoxColumn
{
        public $disabled;
        protected function renderDataCellContent($row,$data)
        {
                if($this->disabled!==null)
                        $this->checkBoxHtmlOptions['disabled']=$this->evaluateExpression($this->disabled,array('data'=>$data,'row'=>$row));
                parent::renderDataCellContent($row,$data);
        }
}
?>
