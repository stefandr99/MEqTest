<?php

class CAdmin {
    private $model;

    public function __construct($action, $decision, $idDoc) {
        if (isset($_SESSION['role']) && $_SESSION['role'] == UserRoles::ADMIN){
            $this->model = new MAdmin();
            
            if($action === 'showDocuments') {
                if($decision !== null && $idDoc !== null) {

                    $this->model->handleDocument($decision, $idDoc);
                }
                $docs = $this->model->showDocuments();
                $view = new VAdmin($docs);
                $view->display();
            }
            else {
                $view = new VAdmin(null);
                $view->displayUserSearch();
            }
        }
        else {
            header("location: index.html");

        }
    }
    
}