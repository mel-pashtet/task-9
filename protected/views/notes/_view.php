<p><li><?php echo Chtml::link($data->notes_name, array('notes/read', 'id'=>$data->id)); ?></li></p>

<p><i>Автор: <?php echo Chtml::link($data->notes_author, array('notes/search', 'notes_author'=>$data->notes_author)); ?></i></p>
        
<p><i>Дата последнего обновления: <?php echo $data->notes_update; ?></i></p>
