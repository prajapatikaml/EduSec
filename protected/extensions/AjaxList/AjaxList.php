<?php

/**
 * Set of pagination-related classes used for fixing some minor bugs that original
 * cListPager With Ajax Update
 * solution.
 * 
 * Based on CBasePage, AjaxListPager.
 */

class AjaxList extends CBasePager
{
	/**
         * This class is an exact copy of CLinkPager extended by introducing class
         */
		const CSS_FIRST_PAGE = 'first';
		const CSS_LAST_PAGE = 'last';
		const CSS_PREVIOUS_PAGE = 'previous';
		const CSS_NEXT_PAGE = 'next';
		const CSS_INTERNAL_PAGE = 'page';
		const CSS_HIDDEN_PAGE = 'hidden';
		const CSS_SELECTED_PAGE = 'selected';

			
		public $maxButtonCount;
		public $nextPageLabel;
		public $prevPageLabel;
		public $firstPageLabel;
		public $lastPageLabel;
		public $header;
		public $footer = '';
		public $cssFile;
		public $htmlOptions = array();
		public $promptText;
		public $pageTextFormat;
		public $mPageSizeOptions = array(10=>10,20=>20,50=>50,100=>100);
		public $mPageSize;
		public $mGridId ;
		public $mDefPageSize;


        public function init()
	{
		if($this->maxButtonCount > 100)
			$this->mPageSizeOptions[$this->maxButtonCount]='All';

		if($this->nextPageLabel === null)
			$this->nextPageLabel = Yii::t('yii', 'Next &gt;');
		if($this->prevPageLabel === null)
			$this->prevPageLabel = Yii::t('yii', '&lt; Previous');
		if($this->firstPageLabel === null)
			$this->firstPageLabel = Yii::t('yii', '&lt;&lt; First');
		if($this->lastPageLabel === null)
			$this->lastPageLabel = Yii::t('yii', 'Last &gt;&gt;');
		if($this->header === null)
			$this->header = Yii::t('yii', 'Go to page: ');

		if(!isset($this->htmlOptions['id']))
			$this->htmlOptions['id'] = $this->getId();
		if(!isset($this->htmlOptions['class']))
			$this->htmlOptions['class'] = 'yiiPager';
                
		if(!isset($this->htmlOptions['id']))
			$this->htmlOptions['id']=$this->getId();
		if(!isset($this->htmlOptions['class']))
			$this->htmlOptions['class']='yiiPager';
	}

	public function run()
	{
		$this->registerClientScript();
		$buttons = $this->createPageButtons();
             	
		if(!empty($buttons))
                {
			//print_r($this->mPageSize);
                        echo($this->header);
                        echo(CHtml::tag('ul', $this->htmlOptions, implode("\n", $buttons)));
                        echo($this->footer);
                }
        /* Page Size */
		$id="'".$this->getOwner()->id."'";
			//Yii::app()->user->setState('pageSize', $this->mPageSize);
			
			$this->mPageSize = null == $this->mPageSize ? @$_GET["pageSize"]: $this->mPageSize;
		
			echo '<ul class="custom-pager-class"><li>View: '.CHtml::dropDownList('pageSize', $this->mPageSize, $this->mPageSizeOptions,array(
					'onchange'=>'$.fn.yiiGridView.update('.$id.',{ data:{pageSize: $(this).val() }})',
			),array('class'=>'pageScroll')).' Per Page</li></ul>';   
				
		
	}

	protected function createPageButtons()
	{
		if(($pageCount = $this->getPageCount()) <= 1)
			return array();
		
		list($beginPage, $endPage) = $this->getPageRange();
		$currentPage = $this->getCurrentPage(false); // currentPage is calculated in getPageRange()
		$buttons = array();

	
		// prev page	
		
		if(($page = $currentPage -1)<0)
			$page = 0;
		/*$buttons[] = $this->createPageButton($this->prevPageLabel, $page, self::CSS_PREVIOUS_PAGE, $currentPage <= 0, false);
		*/
		// internal pages
		for($i = $beginPage;$i <= $endPage;++$i)
			$pages[$i+1]=$this->generatePageText($i);
		$selection=$this->createPageUrl($this->getCurrentPage());
		$pageVar = $this->getPages()->pageVar;
		$id = $this->getOwner()->id;
		$selection = @$_GET[$this->getPages()->pageVar] ? @$_GET[$this->getPages()->pageVar]: 1;
		$buttons[]='<li>page';
		$buttons[]= CHtml::dropDownList($this->getId(),$selection,$pages,array('onchange'=>'$.fn.yiiGridView.update(\''.$this->getOwner()->id.'\',{ data:{'.$this->getPages()->pageVar.': $(this).val() }})',));
		$buttons[]='</li>';

		// next page
		/*if(($page = $currentPage+1) >= $pageCount -1)
			$page = $pageCount -1;
		$buttons[] = $this->createPageButton($this->nextPageLabel, $page, self::CSS_NEXT_PAGE, $currentPage >= $pageCount -1, false).' ---- ' ;
			*/
		

		return $buttons;
	}

	protected function createPageButton($label, $page, $class, $hidden, $selected)
	{
		/**
                 * Here we do some private tweak-ups to have CLinkPager part looking
                 * and working just as we want it to look and work.
                 */
                
               
                
                if($class == self::CSS_FIRST_PAGE)
                {
                        $label = '<<';
                       
                }
                
                if($class == self::CSS_LAST_PAGE)
                {
                        $label = '>>';
                        
                }
                
                if($class == self::CSS_PREVIOUS_PAGE)
                {
                        $label = '<';
                       
                }
                
                if($class == self::CSS_NEXT_PAGE)
                {
                        $label = '>';
                       
                }
                
                if($hidden || $selected) $class .= ' '.($hidden ? self::CSS_HIDDEN_PAGE : self::CSS_SELECTED_PAGE);
                
                $button = '<li  class="'.$class.'">';
                $button.= (!$hidden) ? CHtml::link($label, $this->createPageUrl($page)) : '<span>'.$label.'</span>';
                $button.= '</li>';
                
		return $button;
	}

	protected function getPageRange()
	{
		$currentPage = $this->getCurrentPage();
		$pageCount = $this->getPageCount();
		$beginPage = max(0, $currentPage-(int)($this->maxButtonCount/2));
		if(($endPage = $beginPage+$this->maxButtonCount -1) >= $pageCount)
		{
			$endPage = $pageCount -1;
			$beginPage = max(0, $endPage-$this->maxButtonCount+1);
		}
		return array($beginPage, $endPage);
	}
        
	protected function generatePageText($page)
	{
		if($this->pageTextFormat!==null)
			return sprintf($this->pageTextFormat,$page+1);
		else
			return $page+1;
	}

	public function registerClientScript()
	{
		if($this->cssFile !== false)
			self::registerCssFile($this->cssFile);
	}

	public static function registerCssFile($url = null)
	{
		if($url === null)
			$url = CHtml::asset(Yii::getPathOfAlias('ext.AjaxList.pager').'.css');
		Yii::app()->getClientScript()->registerCssFile($url);
	}
}

?>
