<?php
session_start();
class Post_Block {
    function startPost() {
        echo "<input type='text' name='postID' ";
        echo "value='".md5(uniqid(rand(), true))."'>";
    }
 
    function postBlock($postID) {
        if(isset($_SESSION['postID'])) {
            if ($postID == $_SESSION['postID']) {
                return false;
            } else {
                $_SESSION['postID'] = $postID;
                return true;
            }
        } else {
            $_SESSION['postID'] = $postID;
            return true;
        }
    }
}
?>