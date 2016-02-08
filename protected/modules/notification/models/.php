<?php

/**
 * This is the model class for table "notifyii".
 *
 * The followings are the available columns in table 'notifyii':
 * @property integer $id
 * @property string $title
 * @property string $expire
 * @property string $alert_after_date
 * @property string $alert_before_date
 * @property string $content
 * @property string $role
 * @property string $link
 */
class ModelNotifyii extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Notifyii the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'notifyii';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('expire, content, title', 'required'),
            array('alert_after_date, alert_before_date,from,to, role, link,org_id,notifiyii_department_id', 'safe'),
            array('id, expire, alert_after_date,to, alert_before_date, content, role, link, title,notifiyii_department_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'reads' => array(self::HAS_MANY, 'NotifyiiReads', 'notification_id'),
	    'Rel_emp_id' => array(self::BELONGS_TO, 'EmployeeInfo', 'from'),
	 	       
 );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'expire' => 'Expire',
            'alert_after_date' => 'Alert After Date',
            'alert_before_date' => 'Alert Before Date',
            'content' => 'Content',
            'role' => 'Role',
            'link' => 'Link',
	    'to'=>'To',
	    'org_id'=>'Organization',
	    'from'=>'From',	
	    'notifiyii_department_id'=>'Department',	
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;
	$criteria->with = array('Rel_emp_id');
	$criteria->compare('Rel_emp_id.employee_first_name',$this->from,true);
	
        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('expire', $this->expire, true);
        $criteria->compare('alert_after_date', $this->alert_after_date, true);
        $criteria->compare('alert_before_date', $this->alert_before_date, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('role', $this->role, true);
        $criteria->compare('link', $this->link, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public static function getAllNotifications()
    {	
	
		$criteria = new CDbCriteria(array(
                    'condition' => ':now >= t.alert_after_date AND :now <= t.alert_before_date AND :org=t.org_id AND (:id=t.to OR :id1=t.to) AND :id!=t.from',
                    'params' => array(
                        ':now' => date('Y-m-d'),
			':org'=> Yii::app()->user->getState('org_id'),
			':id'=>Yii::app()->user->id,
			':id1'=>0,
                    )
                ));
	$notifiche = ModelNotifyii::model()
                ->findAll($criteria);
	
        return $notifiche;
    }

    public static function getAllRoledNotifications($role = 'admin')
    {
        $criteria = new CDbCriteria(array(
                    'condition' => ':now >= t.alert_after_date AND :now <= t.alert_before_date AND t.role = :role',
                    'params' => array(
                        ':now' => date('Y-m-d'),
                        ':role' => $role,
                    )
                ));

        $notifiche = ModelNotifyii::model()
                ->findAll($criteria);

        return $notifiche;
    }

    public function isNotReaded()
    {
        return !$this->isReaded();
    }

    public function isReaded()
    {
        if(is_array($this->reads)) {
            foreach ($this->reads as $reads) {
                if($reads->username === Yii::app()->user->id) {
                    return true;
                }
            }
        }

        return false;
    }

    public function beforeSave()
    {
        if($this->alert_after_date === "") {
            $this->alert_after_date = $this->expire;
        }

        if($this->alert_before_date === "") {
            $this->alert_before_date = $this->expire;
        }

        return parent::beforeSave();
    }

    /*public function afterSave()
    {
        $adesso = new DateTime();

        $criteria = new CDbCriteria(array(
                    'condition' => 'alert_before_date < :date',
                    'params' => array(
                        ':date' => $adesso->format('Y-m-d'),
                    )
                ));

        $results = ModelNotifyii::model()
                ->findAll($criteria);

        foreach ($results as $item) {
            $item->delete();
        }

        parent::afterSave();
    }*/
	

}
