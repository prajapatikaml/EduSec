JToggleColumn
====
Column for CGridView which toggles the boolean ( TINYINT(1) ) value of model attribute. Tested with Yii 1.10.

Example
====
![JToggleColumn](https://bitbucket.org/johonunu/jtogglecolumn/raw/6220c9674443/example.png)

History
====
24.04.2012 - first release

25.04.2012 - added filter option and is now using assets

17.06.2012 - added ability to change action(two included: toggle(default) and switch), now using CActions

17.09.2012 - fixed bug with sorting, now sorts column in ajax way

18.09.2012 - New QtoggleAction allow toggles between range value!!!

Tutorial
====
Extract downloaded zip to your components or extensions directory.

If you extracted to extensions directory add this line to import array in your /config/main.php :

    <?php
 
    'import'=>array(
        ...
        'application.extensions.jtogglecolumn.*', 
    )
    
    ?>

Define a JToggleColumn in your CGridView widget:

    <?php 
    
    $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'language-grid',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'columns'=>array(
                    'id',
                    'name',
                    'lang_code',
                    'time_format',
                    array(
                                    'class'=>'JToggleColumn',
                                    'name'=>'is_active', // boolean model attribute (tinyint(1) with values 0 or 1)
                                    'filter' => array('0' => 'No', '1' => 'Yes'), // filter
                                    'htmlOptions'=>array('style'=>'text-align:center;min-width:60px;')
                    ),
                    array(
                                            'class'=>'JToggleColumn',
                                            'name'=>'is_default', // boolean model attribute (tinyint(1) with values 0 or 1)
                                            'filter' => array('0' => 'No', '1' => 'Yes'), // filter
                                            'action'=>'switch', // other action, default is 'toggle' action
                                            'checkedButtonLabel'=>'/images/toggle/yes.png',  // Image,text-label or Html
                                            'uncheckedButtonLabel'=>'/images/toggle/no.png', // Image,text-label or Html
                                            'checkedButtonTitle'=>'Yes.Click to No', // tooltip
                                            'uncheckedButtonTitle'=>'No. Click to Yes', // tooltip
                                            'labeltype'=>'image',// New Option - may be 'image','html' or 'text'
                                            'htmlOptions'=>array('style'=>'text-align:center;min-width:60px;')
                    ),
                    array(
                            'class'=>'CButtonColumn',
                    ),
            ),
    )); 

    ?>
 
Add action(s) in your controller:

    <?php
    
    public function actions(){
        return array(
                'toggle'=>'ext.jtogglecolumn.ToggleAction',
                'switch'=>'ext.jtogglecolumn.SwitchAction', // only if you need it
                'qtoggle'=>'ext.jtogglecolumn.QtoggleAction', // only if you need it
        );
    }
    
    ?>

Don't forget to add this action to controllers accessRules:

    <?php

    public function accessRules()
    {
            return array(
                    array('allow',
                            'actions'=>array('toggle','switch','qtoggle'),
                            'users'=>array('admin'),
                    )
            );
    }

    ?>

New Qtoggle usage demo:

 <?php

    $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'language-grid',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'columns'=>array(
                    'id',
                    'name',
                    'lang_code',
                    'time_format',
                    array(
                                    'class'=>'JToggleColumn',
                                    'action'=>'qtoggle',
                                    'name'=>'answer',
                                    'filter' => array('no' => 'No', 'yes' => 'Yes','dn' => 'Don`t know'),
                                    'queue'=>array('no' => '<span class="green">No</span>', 'yes' => '<span class="red">Yes</span>','dn' => '<span class="gray">???</span>'),//key-label pairs
                                    'queueTitles'=>array('no' => 'No', 'yes' => 'Yes','dn' => 'I don`t know'),//key-tooltips pairs
                                    'labeltype'=>'html',
                                    'htmlOptions'=>array('style'=>'text-align:center;min-width:60px;')
                    ),
                    array(
                                            'class'=>'JToggleColumn',
                                            'filter' => array('0' => 'Draft', '1' => 'Premod',2=>'Public','3'=>'Archive'), // filter
                                            'name'=>'status',
                                            'action'=>'qtoggle',
                                            'queue'=>array('0' => '/images/toggle/draft.png', '1' => '/images/toggle/premod.png',2=>'/images/toggle/pub.png','3'=>'/images/toggle/arch.png'),
                                            'queueTitles'=>array('0' => 'Draft. Toggle to premod', '1' => 'Premod. Toggle to public',2=>'Public. Toggle to archive','3'=>'Archive. Toggle to draft'),
                                            'labeltype'=>'image',
                                            'htmlOptions'=>array('style'=>'text-align:center;min-width:60px;')
                    ),
                    array(
                                                                'class'=>'JToggleColumn',
                                                                'filter' => array('0' => 'Draft', '1' => 'Premod',2=>'Public','3'=>'Archive'), // filter
                                                                'name'=>'varsel',
                                                                'action'=>'qtoggle',
                                                                'queueType'=>'select',  //Show all options in dropdownlist
                                                                'queue'=>array('0' => 'Opt1', '1' => 'Opt2',2=>'Opt3','3'=>'Opt4'),
                                                                'queueTitles'=>array('0' => 'Opt1', '1' => 'Opt2',2=>'Opt3','3'=>'Opt4'),
                                                                'labeltype'=>'text',
                                                                'htmlOptions'=>array('style'=>'text-align:center;min-width:60px;')
                                        ),
                    array(
                            'class'=>'CButtonColumn',
                    ),
            ),
    ));

    ?>