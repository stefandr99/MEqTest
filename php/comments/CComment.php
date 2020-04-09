<?php
    class CComment{

        private $model;
        public function __construct($actiune, $parametri)
        {
            $this->model = new MComment();
            if ($actiune=="adaugaComment") $this->adaugaComment($parametri[0], $parametri[1], $parametri[2]);
            else $this->afiseazaComments($parametri[0]);
        }


        private function afiseazaComments($id_document){
            $comments = $this->model->obtineComments($id_document);
            $view = new VComment($comments);
            $view -> oferaVizualizare();
        }

        private function adaugaComment($id_document, $id_user, $mesaj){
            $this->model->adaugaComment($id_document, $id_user, $mesaj);
        }

    }

?>