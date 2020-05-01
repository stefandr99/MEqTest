<?php
    class VPostContent{

        private $query;
        private $id;

        public function __construct($query, $id) {
            $this->query = $query;
            $this->id = $id; 
        }

        public function viewPostContent(){
            if($this->query->rowcount() === 0){ //when this if is triggered it means the page doesn't exist
                echo '<div class="title-main">Page not found</div><hr class="section-divider-bar">';
                BD::opreste_conexiune();
                exit();
            } else {
                $row = $this->query->fetch(PDO::FETCH_ASSOC);
                
                echo '<div class="title-main">' . $row['NAME'] . '</div><hr class="section-divider-bar">';
                echo $row['CONTENT'];
                echo '<p style="text-align: center; font-size: 30px; margin-top: 2%;">Think you got it? Then try solving the problems! </p>
                <div style="text-align: center; align-content: center;">
                    <button class="button-regular" type="button" onclick="window.open(\'quiz.php?id=' . $this->id . '\');">Practice</button>
                </div>';
            }
        }

    }

?>