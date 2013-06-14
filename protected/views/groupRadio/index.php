<?php
/* @var $this GroupRadioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Group Radios',
);

$this->menu=array(
	array('label'=>'Create GroupRadio', 'url'=>array('create')),
	array('label'=>'Manage GroupRadio', 'url'=>array('admin')),
);
?>

<h1>Group Radios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
