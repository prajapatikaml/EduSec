<?php

Yii::import('zii.widgets.grid.CGridView');
	/**
	* @author Nikola Kostadinov
	* @license GPL
	* @version 0.2
	*/	
	class EExcelView extends CGridView
	{
		// PHP Excel Path
		public static $phpExcelPathAlias = '@app/vendor/phpoffice/phpexcel/Classes/PHPExcel';
	
		//the PHPExcel object
		public static $objPHPExcel = null;
		public static $activeSheet = null;
	
		//Document properties
		public $creator = 'Nikola Kostadinov';
		public $title = null;
		public $subject = 'Subject';
		public $description = '';
		public $category = '';
		public $freezePane = null;		
		
		//config
		public $autoWidth = true;
		public $exportType = 'Excel5';
		public $disablePaging = true;
		public $filename = null; //export FileName
		public $stream = true; //stream to browser

		//data
		// For performance reason, it's good to have it static and populate it once in all the execution
		public static $data = null;
		
		//mime types used for streaming
		public $mimeTypes = array(
			'Excel5' => array(
				'Content-type'=>'application/vnd.ms-excel',
				'extension'=>'xls',
			),
			'Excel2007' => array(
				'Content-type'=>'application/vnd.ms-excel',
				'extension'=>'xlsx',
			),
			'PDF' =>array(
				'Content-type' => 'application/pdf',
				'extension'=>'pdf',
			),
			'HTML' =>array(
				'Content-type'=>'text/html',
				'extension'=>'html',
			),
			'CSV' =>array(
				'Content-type'=>'application/csv',			
				'extension'=>'csv',
			)
		);
		
		public function init()
		{
			if(!isset($this->title))
				$this->title = Yii::app()->getController()->getPageTitle();

			parent::init();
			
			//Autoload fix
			spl_autoload_unregister(array('YiiBase','autoload'));             
			Yii::import(self::$phpExcelPathAlias, true);
			self::$objPHPExcel = new PHPExcel();
			//self::$activeSheet = self::$objPHPExcel->getActiveSheet();
			self::$activeSheet = self::$objPHPExcel->getActiveSheet()->freezePane($this->freezePane);
			spl_autoload_register(array('YiiBase','autoload'));  
			
			// Creating a workbook
			$properties = self::$objPHPExcel->getProperties();
			$properties
			->setTitle($this->title)
			->setCreator($this->creator)
			->setSubject($this->subject)
			->setDescription($this->description)
			->setCategory($this->category);

			//$this->initColumns();
		}
		
		
		public function renderHeader()
		{
			$i=0;
			foreach($this->columns as $n=>$column)
			{
				++$i;
				if($column->name!==null && $column->header===null)
				{
					if($column->grid->dataProvider instanceof CActiveDataProvider)
						$head = $column->grid->dataProvider->model->getAttributeLabel($column->name);
					else
						$head = $column->name;
				} else
					$head =trim($column->header)!=='' ? $column->header : $column->grid->blankDisplay;

				self::$activeSheet->setCellValue($this->columnName($i)."1" ,$head);
			}			
		}
		public function renderFooter()//footer created by francis
		{
			
			$i=0;
			$data=$this->dataProvider->getData();
			$row=count($data);
			foreach($this->columns as $n=>$column)
			{
				$i=$i+1;
			  
					$footer =trim($column->footer)!=='' ? $column->footer : "";

				self::$activeSheet->setCellValue($this->columnName($i).($row+2),$footer);
			}			
		}
		
		// Main consuming function, apply every optimization you could think of
		public function renderBody()
		{
			if($this->disablePaging) //if needed disable paging to export all data
				$this->enablePagination = false;

			self::$data = $this->dataProvider->getData();
			$n=count(self::$data);

			if($n>0)
				for($row=0; $row < $n; ++$row)
					$this->renderRow($row);
		}
		

		public function renderRow($row)
		{
			$i=0;
			foreach($this->columns as $n=>$column):
				if($column->value!==null) 
					$value=$this->evaluateExpression($column->value ,array('row'=>$row,'data'=>self::$data));
  
				else if($column->name!==null) 
				{
				   //edited by francis to support relational dB tables
					$condition= explode(";", $column->name);
					$value=$column->name;

					// I don't understand this piece of code (the conditions and all that stuff), when these conditions will meet?
					// Francis, if you see this code ever again, please comment
					$countCondition = count($condition);

					if($countCondition==6 || $countCondition==5):
						switch($countCondition):
							case 6:
								$cond1=$this->dataProcess($condition[0],$row);
								if($condition[3]=='true')
									$cond2=$condition[2];
								else
									$cond2=$this->dataProcess($condition[2],$row);

								$cond3=$this->dataProcess($condition[4],$row);
								$cond4=$this->dataProcess($condition[5],$row);
								break;
							case 5:
								$cond1=$this->dataProcess($condition[0],$row);
								$cond2=$this->dataProcess($condition[2],$row);
								$cond3=$this->dataProcess($condition[3],$row);
								$cond4=$this->dataProcess($condition[4],$row);
								break;
							default:
								break;
						endswitch;

						switch($condition[1]):
							case '==':
								$value = ($cond1==$cond2)? $cond3 : $cond4;
								break;
							case '!=':
								$value = ($cond1!=$cond2)? $cond3 : $cond4;
								break;				
							case '<=':
								$value = ($cond1<=$cond2)? $cond3 : $cond4;
							case '>=':
								$value = ($cond1>=$cond2)? $cond3 : $cond4;
								break;
							case '<':
								$value = ($cond1<$cond2)? $cond3 : $cond4;
							case '>':
								$value = ($cond1>$cond2) ? $cond3 : $cond4;
							default:
								break;	
						endswitch;

					elseif($countCondition!=1):
						$value='';
					else:
						$value=$this->dataProcess($column->name,$row);
					endif;
				}
			      

			      $date_value = DateTime::createFromFormat("Y-m-d", $value);

			      if ($date_value == true)  {

				//date edited francis 
				$my_value = str_replace(" ","-",$value);
				$dateF= explode("-", $my_value);
				$c1=count($dateF);

				if($c1 == 4 && $dateF[0]<9000 && $dateF[1]<13 && $dateF[2]<32)//{}
					$value=$dateF[2].'/'.$dateF[1].'/'.$dateF[0]." ".$dateF[3];

				if($c1 == 3 && $dateF[0]<9000 && $dateF[1]<13 && $dateF[2]<32)//{}
					$value=$dateF[2].'/'.$dateF[1].'/'.$dateF[0];
				//end of date  
				}
				
				$value=$value===null ? "" : $column->grid->getFormatter()->format($value,$column->type);


//By Ravi Bhalodiya on 2013-01-21
				$value=str_replace("&amp;","&",$value);
				$value=str_replace("&#039;s","'s",$value);
				$value=str_replace("&#039;S","'S",$value);
				
				if($column->name == 'current_sem' && $value == 1)
					$value = 'Active';
				else if($column->name == 'current_sem' && $value == 0)
					$value = 'Inactive';				
				else if($column->name == 'subject_active' && $value == 0)
					$value = 'Inactive';
				else if($column->name == 'subject_active' && $value == 1)
					$value = 'Active';
				else if($column->name == 'active' && $value == 0)
					$value = 'Inactive';
				else if($column->name == 'active' && $value == 1)
					$value = 'Active';
				else if($column->name == 'Rel_Emp_Info.employee_type' && $value == 0)
					$value = 'Non Teaching';
				else if($column->name == 'Rel_Emp_Info.employee_type' && $value == 1)
					$value = 'Teaching';
				else if($column->name == 'fees_payment_cheque_status' && $value == 1)
					$value = 'Return Cheque';	
				else if($column->name == 'valid_for' && $value == 1)
					$value = '6 Months';	
				else if($column->name == 'valid_for' && $value == 2)
					$value = '12 Months';	
				else if($column->name == 'email_sms_status' && $value == 1)
					$value = 'Sms';	
				else if($column->name == 'email_sms_status' && $value == 2)
					$value = 'Email';	
				
				
				// Write to the cell (and advance to the next)
				self::$activeSheet->setCellValue( $this->columnName(++$i).($row+2) , $value);
			endforeach;
			
			// As we are done with this row we DONT need this specific record
			unset(self::$data[$row]);		
		}

		public function dataProcess($name,$row)
		{
			// Separate name (eg person.code into array('person', 'code'))
			$separated_name = explode(".", $name);
			
			// Count 
			$n=count($separated_name);
				
			// Create a copy of  the data row. Now we can "dive" trough the array until we reach the desired value
			// (because is nested)
			$aux = self::$data[$row]; //if n is greater than zero, we will loop, if not, $aux actually holds the desired value

			for($i=0; $i < $n; ++$i)
				$aux = $aux[$separated_name[$i]]; // We keep a deeper reference each time

			return $aux;
		}	
				
		public function run()
		{
			$this->renderHeader();
			$this->renderBody();	
			$this->renderFooter();
			
			//set auto width
			if($this->autoWidth)
				foreach($this->columns as $n=>$column)
					self::$objPHPExcel->getActiveSheet()->getColumnDimension($this->columnName($n+1))->setAutoSize(true);
			
			//create writer for saving
			$objWriter = PHPExcel_IOFactory::createWriter(self::$objPHPExcel, $this->exportType);
			if(!$this->stream)
				$objWriter->save($this->filename);
			else //output to browser
			{
				if(!$this->filename)
					$this->filename = $this->title;
				ob_end_clean();
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header('Pragma: public');
				header('Content-type: '.$this->mimeTypes[$this->exportType]['Content-type']);
				header('Content-Disposition: attachment; filename="'.$this->filename.'.'.$this->mimeTypes[$this->exportType]['extension'].'"');
				header('Cache-Control: max-age=0');				
				$objWriter->save('php://output');			
				Yii::app()->end();
			}
		}

		/**
		* Returns the coresponding excel column.(Abdul Rehman from yii forum)
		* 
		* @param int $index
		* @return string
		*/
		public function columnName($index)
		{
			--$index;
			if($index >= 0 && $index < 26)
				return chr(ord('A') + $index);
			else if ($index > 25)
				return ($this->columnName($index / 26)).($this->columnName($index%26 + 1));
			else
				throw new Exception("Invalid Column # ".($index + 1));
		}		
		
	}
