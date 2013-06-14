<?php
/* @var $this RadioController */
/* @var $model Radio */

$this->breadcrumbs=array(
	'Radios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Radio', 'url'=>array('index')),
	array('label'=>'Manage Radio', 'url'=>array('admin')),
);
?>

<h1>Create Radio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>