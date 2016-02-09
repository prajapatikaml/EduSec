<?php
/*****************************************************************************************
 * EduSec  Open Source Edition is a School / College management system developed by
 * RUDRA SOFTECH. Copyright (C) 2010-2015 RUDRA SOFTECH.

 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see http://www.gnu.org/licenses. 

 * You can contact RUDRA SOFTECH, 1st floor Geeta Ceramics, 
 * Opp. Thakkarnagar BRTS station, Ahmedbad - 382350, India or
 * at email address info@rudrasoftech.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * RUDRA SOFTECH" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by RUDRA SOFTECH".
 *****************************************************************************************/
/**
 * @package EduSec.modules.employee.models
 */

namespace app\modules\employee\models;

use Yii;
use app\models\DocumentCategory;
use app\models\User;
/**
 * This is the model class for table "emp_docs".
 *
 * @property integer $emp_docs_id
 * @property string $emp_docs_details
 * @property integer $emp_docs_category_id
 * @property string $emp_docs_path
 * @property string $emp_docs_submited_at
 * @property integer $emp_docs_status
 * @property integer $emp_docs_emp_master_id
 * @property integer $created_by
 *
 * @property Users $createdBy
 * @property EmpMaster $empDocsEmpMaster
 */
class EmpDocs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $emp_docs_category_id_temp;
    public static function tableName()
    {
        return 'emp_docs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_docs_category_id','emp_docs_submited_at', 'emp_docs_emp_master_id', 'created_by'], 'required','message'=>''],
            [['emp_docs_category_id', 'emp_docs_status', 'emp_docs_emp_master_id', 'created_by'], 'integer'],
            [['emp_docs_submited_at','emp_docs_path','emp_docs_category_id_temp'], 'safe'],
            [['emp_docs_details','emp_docs_category_id_temp'], 'string', 'max' => 100],
            [['emp_docs_path'],'file', 'extensions' => 'jpg, png, pdf, txt, jpeg, doc, docx']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'emp_docs_id' => 'Document',
            'emp_docs_details' => 'Document Details',
            'emp_docs_category_id' => 'Category ',
            'emp_docs_path' => 'Document',
            'emp_docs_submited_at' => 'Submited Date',
            'emp_docs_status' => 'Status',
            'emp_docs_emp_master_id' => 'Employee',
            'created_by' => 'Created By',
	    'emp_docs_category_id_temp' => 'Category',	
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['user_id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpDocsEmpMaster()
    {
        return $this->hasOne(EmpMaster::className(), ['emp_master_id' => 'emp_docs_emp_master_id']);
    }

	/**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpDocsCategory()
    {
        return $this->hasOne(DocumentCategory::className(), ['doc_category_id' => 'emp_docs_category_id']);
    }
	
}
