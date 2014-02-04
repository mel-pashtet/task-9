<?php

class NotesController extends Controller
{
	public function actionDelete()
	{
		$id = '';

		if (isset($_GET['id']))
		{
			$id = $_GET['id'];

		}
			
		$model=Notes::model()->findByPk($id);
			
		if (isset($model))
		{
			$model->delete();
			$this->redirect($this->createUrl('notes/index'));
			
		}
		else
			throw new CHttpException(404,'Указанная запись не найдена');
			
			
		
		
	}
	public function actionUpdate()
	{
		$id = '';
		if (isset($_GET['id']))
		{
			$id = $_GET['id'];
		}

		$model=Notes::model()->findByPk($id);
		
		if (isset($model))						
		{
			if (isset($_POST['Notes']))
			{
				$model->attributes = $_POST['Notes'];
				if($model->validate())												// якщо дані проходять валідацію, оновлюєм
	    		{
	    			$model->save();
	    			$this->redirect($this->createUrl('notes/index'));

		    	}
			}

		    

		}
		else
			throw new CHttpException(404,'Указанная запись не найдена');
		
		$this->render('update', array('model'=>$model));
	
	}
	public function actionRead()												// просмотр однієї замітки
	{
		$id = '';
		if (isset($_GET['id']))
		{
			$id = $_GET['id'];
		}
		
		$model = Notes::model()->findByPK($id);
		
		if (isset($model))
		{
			$this->render('read', array('model'=>$model));
		}
		else
			throw new CHttpException(404,'Указанная запись не найдена');
		
		
		

	}
	public function actionSearch()
	{
		if (isset($_GET['notes_author']))										// якщо задано пошук по автору
		{
			$search = $_GET['notes_author'];
			$condition = array(
	        'condition'=>"notes_author = :search",
	        'params' => array( ':search' => $search ),
	        'order'=>'id',
	        
	        );
	        
	        

		}
		
		if (isset($_GET['search']))												// якщо задано пошуковий запит по назві або вмісту замітки
		{
			$search = $_GET['search'];
			$condition = array(
	        'condition'=>"notes_name LIKE :search OR notes_value LIKE :search",
	        'params' => array( ':search' => '%' . $search . '%' ),
	        'order'=>'id',
	        
	        );

		
			
        }

 
        $dataProvider=new CActiveDataProvider('Notes', array(
	    	'criteria'=>$condition,
	        'countCriteria'=>$condition,
	        'pagination'=>array(
	        'pageSize'=>1,
	        ),
	        ));

			$this->render('search', array(
	            'dataProvider'=>$dataProvider
            ));

		
	}
	
	public function actionCreate()
	{
		$model = new Notes();
		
		if (isset($_POST['Notes']))												// якщо задано поля форми
		{			
		    $model->attributes = $_POST['Notes'];
		    
		    if($model->validate())												// якщо значення полів валідні, записуєм
		    {
		    	$model->save();
		    	
		    	$this->redirect($this->createUrl('notes/index'));

		    }
		    
            
		    
		}
		
		$this->render('create', array('model'=>$model));
		
	}

	public function actionIndex()												// екшн на відображення всього списку
	{
		$sort = new CSort();
		$sort->defaultOrder = 'id';
		$dataProvider=new CActiveDataProvider('Notes', array('pagination'=>array('pageSize'=>1), 'sort'=>$sort,));
		$this->render('index', array(
            'dataProvider'=>$dataProvider,
        ));

	
	}


}