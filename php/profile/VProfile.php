<?php
  class VProfile {

    private $user;

    public function __construct($user) {
        $this->user = $user;
    }

    public function viewProfile() {
        if($this->user->rowcount() === 0) {
            echo 'Error 404 user not found';
        } else {
            $row = $this->user->fetch(PDO::FETCH_ASSOC);
            echo $row['ID'].$row['USERNAME'].$row['IMAGE_PATH'];
            echo '<img src="'.$row['IMAGE_PATH'].'">';
        }
    }
  }
?>