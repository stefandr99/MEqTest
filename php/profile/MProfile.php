<?php
  require_once __DIR__ . "/../db_utils/database_conn.php";

  class MProfile {
    public function getProfileInfo($id_user) {
        $sql = "SELECT u.ID, USERNAME, IMAGE_PATH, SCORE, ADMIN, COUNT(ID_USER) as DOC from users u join documents d on d.ID_USER = u.ID where u.id = :id_user";
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

    public function deleteUser($id_user) {
        $sql = "DELETE from users
        WHERE id = :id_user";
        $request = BD::obtine_conexiune()->prepare($sql);
        $request->execute([
            'id_user' => $id_user
        ]);

        $sql = "UPDATE documents
        SET id_user = 1
        WHERE id_user = :id_user";
        $request = BD::obtine_conexiune()->prepare($sql);
        $request->execute([
            'id_user' => $id_user
        ]);

        header("location: php/userAccount/logout.php");
    }
}
?>