<?php
Yii::import('zii.widgets.CPortlet');
 
class Library extends CPortlet
{
    protected function renderContent()
    {
?>
  <ul class="links">
	<?php if(Yii::app()->user->checkAccess('Library.LibraryBookType.Admin')) : ?>	
	<li><?php echo CHtml::link("Book Type",array('/library/libraryBookType/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Library.libraryBookCupboardMaster.Admin')) : ?>	
	<li><?php echo CHtml::link("Cupboard",array('/library/libraryBookCupboardMaster/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

        <?php if(Yii::app()->user->checkAccess('Library.libraryBookCupboardShelfMaster.Admin')) : ?>	
	<li><?php echo CHtml::link("Cupboard Shelf",array('/library/libraryBookCupboardShelfMaster/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Library.BookVenderDetails.Admin')) : ?>	
	<li><?php echo CHtml::link("Vender Details",array('/library/bookVenderDetails/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Library.BookPurchaseDetails.Admin')) : ?>	
	<li><?php echo CHtml::link("Purchase Details",array('/library/bookPurchaseDetails/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Library.LibraryBookMaster.Admin')) : ?>	
	<li><?php echo CHtml::link("Book",array('/library/libraryBookMaster/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Library.LibraryBookTransaction.Allbook')) : ?>	
	<li><?php echo CHtml::link("Book Request",array('/library/libraryBookTransaction/allbook', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Library.LibraryBookTransaction.Librarianbookissue')) : ?>	
	<li><?php echo CHtml::link("Book Issue",array('/library/libraryBookTransaction/librarianbookissue', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Library.LibraryBookStudentTransaction.Studempwisesearch')) : ?>	
	<li><?php echo CHtml::link("Book Return",array('/library/libraryBookStudentTransaction/studempwisesearch', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Library.LibraryBookStudentTransaction.Holderbookhistory')) : ?>	
	<li><?php echo CHtml::link("Book Holder Report",array('/library/libraryBookStudentTransaction/holderbookhistory', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Library.librarybook.bookSearch')) : ?>	
	<li><?php echo CHtml::link("Catalog",array('/library/librarybook/bookSearch', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm','target'=>'_blank'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Library.libraryBookTransaction.Barcodebook')) : ?>	
	<li><?php echo CHtml::link("Barcode",array('/library/libraryBookTransaction/Barcodebook', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Library.libraryLibrarianDetails.admin')) : ?>	
	<li><?php echo CHtml::link("Librarian",array('/library/libraryLibrarianDetails/admin', 'page'=>Yii::app()->request->getParam('page')),array('class'=>'changeForm'));?></li>
	<?php endif; ?>

  </ul>
<?php
    }
}
?>
