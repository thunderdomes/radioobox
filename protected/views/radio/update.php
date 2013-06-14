<?php
/* @var $this RadioController */
/* @var $model Radio */

$this->breadcrumbs=array(
	'Radios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Radio', 'url'=>array('index')),
	array('label'=>'Create Radio', 'url'=>array('create')),
	array('label'=>'View Radio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Radio', 'url'=>array('admin')),
);
?>

<h1>Update Radio <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>