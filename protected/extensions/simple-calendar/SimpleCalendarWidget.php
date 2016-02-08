<?php

class SimpleCalendarWidget extends CWidget {
    
    protected $_day             = null;
    protected $_month           = null;
    protected $_year            = null;
    
    public function init() {
        $this->initDate();
        parent::init();
    }
    
    protected function initDate() {
        if(isset($_GET['year'])) {
            $this->year = $_GET['year'];
        }
        
        if(isset($_GET['month'])) {
            $this->month = $_GET['month'];
        }
        
        if(isset($_GET['day'])) {
            $this->day = $_GET['day'];
        }
    }
    
    public function run() {
        $this->registerScripts();
        $this->render('simple-calendar');
    }
    
    protected function registerScripts() {
        $cssFile = dirname(__FILE__).DIRECTORY_SEPARATOR.'css/simple-calendar.css';
        $publishedCss = Yii::app()->assetManager->publish($cssFile);
        Yii::app()->clientScript->registerCssFile($publishedCss);
    }
    
    public function getYear() {
        if(is_null($this->_year)) {
            $this->_year = (int)date('Y');
        }
        return $this->_year;
    }
    
    public function getMonth() {
        if(is_null($this->_month)) {
            $this->_month = (int)date('n');
        }
        return $this->_month;
    }
    
    public function getDay() {
        if(is_null($this->_day)) {
            $this->_day = (int)date('j');
        }
        return $this->_day;
    }
    
    public function getMonthName() {
        return Yii::app()->dateFormatter->format('MMMM', $this->getTimestamp());
    }
    
    public function setYear($value) {
        if(is_numeric($value) && $value > 0) {
            $this->_year = $value;
        } else {
            throw new Exception(Yii::t('simple-calendar', 'Invalid value for Year. It must be a non-negative year'));
        }
        
    }
    
    public function setMonth($value) {
        if(is_numeric($value) && $value >= 1 && $value <= 12) {
            $this->_month = $value;
            if(!$this->dayIsInCurrentMonth($this->day)) {
                $this->day = $this->getDaysInCurrentMonth();
            }
        } else {
            throw new Exception(
                Yii::t('simple-calendar', 'Invalid value for month. Please use a value between 1 and 12.')
            );
        }
    }
    
    public function setDay($value) {
        if(is_numeric($value)) {
            if($this->dayIsInCurrentMonth($value)) {
                $this->_day = $value;
            } else {
                throw new Exception(
                    Yii::t(
                        'simple-calendar', 
                        'Invalid value for day. For the specified month, please user a value between 1 and {daysInCurrentMonth}.', 
                        array('{daysInCurrentMonth}' => $this->getDaysInCurrentMonth())
                    )
                );
            }
        } else {
            throw new Exception(Yii::t('simple-calendar', 'Invalid value for day.'));
        }
    }
    
    public function getTimestamp() {
        return CDateTimeParser::parse("{$this->year}-{$this->month}-{$this->day}", 'yyyy-M-d');
    }
    
    public function getFirstDayOfTheWeek() {
        $firstDayTimestamp = CDateTimeParser::parse("{$this->year}-{$this->month}-1", 'yyyy-M-d');
        return date('w', $firstDayTimestamp);
    }
    
    public function getDaysInCurrentMonth() {
        return $this->getDaysInMonth($this->month, $this->year);
    }
    
    public function getDaysInMonth($month, $year) {
        return cal_days_in_month(CAL_GREGORIAN, $month, $year);
    }
    
    public function getPreviousLink() {
        return $this->getLink(
            $this->previousYear, 
            $this->previousMonth, 
            $this->getDaysInMonth($this->previousMonth, $this->previousYear)
        );
    }
    
    public function getPreviousMonth() {
        if($this->month == 1) {
            return 12;
        } else {
            return $this->month - 1;
        }
    }
    
    public function getPreviousYear() {
        if($this->month == 1) {
            return $this->year - 1;
        } else {
            return $this->year;
        }
    }
    
    public function getNextLink() {
        return $this->getLink(
            $this->nextYear, 
            $this->nextMonth, 
            $this->getDaysInMonth($this->nextMonth, $this->nextYear)
        );
    }
    
    public function getNextMonth() {
        if($this->month == 12) {
            return 1;
        } else {
            return $this->month + 1;
        }
    }
    
    public function getNextYear() {
        if($this->month == 12) {
            return $this->year + 1;
        } else {
            return $this->year;
        }
    }
    
    public function getDayLink($day) {
        //return $this->getLink($this->year, $this->month, $day);
    }
    
    protected function getLink($year = null, $month = null, $day = null) {
        $params = array();
        if(!is_null($year)) {
            $params['year'] = $year;
        }
        
        if(!is_null($month)) {
            $params['month'] = $month;
        }
        
        if(!is_null($day)) {
            $params['day'] = $day;
        }
        
        $params = array_merge($_GET, $params);
        return Yii::app()->getController()->createUrl('', $params);
    }
    
    private function dayIsInCurrentMonth($day) {
        return $day >= 1 && $day <= $this->daysInCurrentMonth;
    }
}

?>
