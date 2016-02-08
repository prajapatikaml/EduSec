<?php

class CommonMethods {
 
    private $data = array();
   
    public function makeDropDown($parents)
    {
        global $data;
        $data = array();
        foreach($parents as $parent)
        {
           
                $data[$parent->hostel_information_id] = $parent->hostel_name;
                $this->subDropDown($parent->children);
               
        }
       
       return $data;
    }
   
  public function subDropDown($children,$space = '---')
    {
        global $data;
       
        foreach($children as $child)
                {
                   
                        $data[$child->hostel_information_id] = $space.$child->hostel_name;
                        $this->subDropDown($child->children,$space.'---');
                }
       
    }
   
   
}
?>

