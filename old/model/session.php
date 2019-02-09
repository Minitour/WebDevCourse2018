<?php
    require_once('codable.php');

    class Session extends Codable {
        var $object_id; // the object id.
        var $user_id; // the id of the user.
        var $session_token; // the session token value.
    }
?>