<?php
$this->breadcrumbs=array(
	'Whitelists'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Whitelist','url'=>array('create')),
	array('label'=>'Optimise Whitelist','url'=>array('optimise')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('whitelist-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Whitelists</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'whitelist-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'description',
		'host',
		'facility',
		'level',
		'program',
		/*
		'pattern',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>