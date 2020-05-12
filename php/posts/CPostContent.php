<?php
class CPostContent{
    private $model;
    
    public function __construct($action, $params) {
        $this->model = new MPostContent();
        
        if($action === 'showPostContent'){
            $data = $this->model->getPostContent($params[0]);
            $view = new VPostContent($data, $params[0]);
            $view->viewPostContent();
        }
        else if($action === 'insertContent') {        
            $view = new VPostContent(null, null);
            $view->viewUploadPage();
            $view->viewQuizEditor();  
            $this->model->insertDocument($params[0], $params[1], $params[2], $params[3]);  

        }
    }
}

?>