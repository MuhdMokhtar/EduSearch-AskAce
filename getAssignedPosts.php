<?php

require_once "dbase.php";

function getAssignedPosts() {
    global $mysqli;
    $query = "SELECT PostTitle, PostContent FROM post";
    $result = $mysqli->query($query);
    $posts = [];
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
    return $posts;
}

// Usage:
$assignedPosts = getAssignedPosts();

?>