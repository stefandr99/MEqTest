<?php
    class VComment{

        private $comms;

        public function __construct($comm) {
            $this->comms = $comm;
        }

        public function oferaVizualizare(){
            if($this->comms->rowcount() === 0){
                echo 'No comments';
            } else{
                while($row = $this->comms->fetch(PDO::FETCH_ASSOC)){
                    echo '<div class="comment-imgwrapper">';
                    echo '<img src="' . $row['IMAGE_PATH'] . '" alt="img" class="comment-img"/> <div class="comment-username">' . $row['USERNAME'] . '</div></div>';
                    echo '<div class="comment-content"><p>' . htmlspecialchars($row['TEXT'], ENT_QUOTES, 'UTF-8') . '</p></div>';
                    echo '<hr class="comment-divider-bar">';
                }
            }
        }

    }

?>