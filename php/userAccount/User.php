<?php

class User {
    protected $google_client;

    public function __construct() {
        $this->google_client = new Google_Client();

        $this->google_client->setClientId('87779269660-efp8di50vjfmodnqbn1l7euj5tp7ko4g.apps.googleusercontent.com');

        $this->google_client->setClientSecret('A7gm63efTbaSaak-kvsB6LFG');

        $this->google_client->setRedirectUri('http://localhost/MEq/php/userAccount/login.php');

        $this->google_client->addScope('email');

        $this->google_client->addScope('profile');
    }

}
