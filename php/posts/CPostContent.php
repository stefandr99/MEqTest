<?php
class CPostContent{
    private $model;

    public function __construct($action, $params){
        $this->model = new MPostContent();
        
        if($action === 'showPostContent'){
            $view = new VPostContent($this->model->getPostContent($params[0]), $params[0]);
            $view->viewPostContent();
        }
    }
}

?>