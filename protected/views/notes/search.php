<?
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'ajaxUpdate'=>false,					//щоб після перегрузки сторінки зберігався номер сторінки
    'itemView'=>'_view',
    'pager'=>array(
    'class'=>'CLinkPager',
    'header'=>false,
    'maxButtonCount'=>'5',
       
    'prevPageLabel'=>'попередня',
    'nextPageLabel'=>'наступна',
    

     ),
));
?>
<h1 align='center'><?php echo Chtml::link('reset', array('notes/index')); ?></h1>