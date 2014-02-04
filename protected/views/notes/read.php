<div align='center'>
	<h1>ИМЯ</h1>
	<i><h3><?=$model->notes_name;?></h3></i>
	<h1>СОДЕРЖИМОЕ</h1>
	<i><h3><?=$model->notes_value;?></h3></i>
	<h1>АВТОР</h1>
	<i><h3><a href="<?=$this->createUrl('notes/search', array('notes_author'=>$model->notes_author));?>"><?=$model->notes_author; ?></a></h3></i>
	<h1>ДАТА ПОСЛЕДНЕГО ОБНОВЛЕНИЯ</h1>
	<i><h3><?=$model->notes_update;?></h3></i>
</div>
<div align='left'>
	<p><a href="<?=$this->createUrl('notes/update', array('id'=>$model->id));?>">РЕДАКТИРОВАТЬ</a></p>
	<p><a href="<?=$this->createUrl('notes/delete', array('id'=>$model->id));?>">УДАЛИТЬ</a></p>
	
</div>