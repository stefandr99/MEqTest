<?php
  require_once __DIR__ . "/../db_utils/database_conn.php";

  class MProfile {
    public function getProfileInfo($id_user) {
        $sql = "SELECT ID, USERNAME, IMAGE_PATH from users u 
        where id = :id_user";
        $request = BD::obtine_conexiune()->prepare($sql);
        $request->execute([
        'id_user' => $id_user
        ]);
        return $request;
    }

    public function uploadAvatar($id_user, $avatar_user) {
        $sql = "UPDATE users
        SET IMAGE_PATH = :avatar_user
        WHERE id = :id_user";
        $request = BD::obtine_conexiune()->prepare($sql);
        $request->execute([
        'avatar_user' => $avatar_user,
        'id_user' => $id_user
        ]);
    }
}
?>