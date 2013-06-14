<?php
/* @var $this GroupRadioController */
/* @var $model GroupRadio */

$this->breadcrumbs=array(
	'Group Radios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GroupRadio', 'url'=>array('index')),
	array('label'=>'Create GroupRadio', 'url'=>array('create')),
	array('label'=>'View GroupRadio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GroupRadio', 'url'=>array('admin')),
);
?>

<h1>Update GroupRadio <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>