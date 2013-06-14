<?php
/* @var $this GroupRadioController */
/* @var $model GroupRadio */

$this->breadcrumbs=array(
	'Group Radios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GroupRadio', 'url'=>array('index')),
	array('label'=>'Manage GroupRadio', 'url'=>array('admin')),
);
?>

<h1>Create GroupRadio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>