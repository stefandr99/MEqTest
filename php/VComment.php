<?php
    class VComment{

        private $comms;

        public function __construct($comm) {
            $this->comms = $comm;
        }

        public function oferaVizualizare(){
            while($row = $this->comms->fetch(PDO::FETCH_ASSOC)){
                echo '<div class="comment-imgwrapper"><img src="' . $row['IMAGE_PATH'] . '" alt="img" class="comment-img"/></div>';
                echo '<div class="comment-username">' . $row['USERNAME'] . '</div>';
                echo '<div class="coment-content"><p>' . $row['TEXT'] . '</p></div>';
            }
        }

    }

?>