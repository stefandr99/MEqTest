<?php
class CPostContent{
    private $model;
    private $content_err = "", $title_err = "";
    public function __construct($action, $params) {
        $this->model = new MPostContent();
        
        if($action === 'showPostContent'){
            $view = new VPostContent($this->model->getPostContent($params[0]), $params[0]);
            $view->viewPostContent();
        }
        else if($action === 'insertContent') {        
            $this->model->insertDocument($params[0], $params[1], $params[2]);  
            $view = new VPostContent(null, null);
            $view->viewUploadPage();
            $view->viewQuizEditor();  
        }
    }
}

?>