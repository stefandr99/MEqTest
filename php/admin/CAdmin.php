<?php

class CAdmin {
    private $model;

    public function __construct($action, $decision, $idDoc) {
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
            $view->display();
        }
    }
}