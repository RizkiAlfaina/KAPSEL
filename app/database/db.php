<?php

session_start();
require('connect.php');



function dd($value) // to be deleted
{
    echo "<pre>", print_r($value, true), "</pre>";
    die();
}


function executeQuery($sql, $data)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt;
}


function selectAll($table, $conditions = [])
{
    global $conn;
    $sql = "SELECT * FROM $table";
    if (empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
        
        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}


function selectOne($table, $conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table";

    $i = 0;
    foreach ($conditions as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " WHERE $key=?";
        } else {
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }

    $sql = $sql . " LIMIT 1";
    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;
}

function selectPopular($table, $conditions = [])
{
    global $conn;
    $sql = "SELECT * FROM $table";

    if (empty($conditions)) {
        $sql .= " ORDER BY RAND() LIMIT 5";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql .= " WHERE $key=?";
            } else {
                $sql .= " AND $key=?";
            }
            $i++;
        }

        $sql .= " ORDER BY RAND() LIMIT 5";

        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}



function create($table, $data)
{
    global $conn;
    $sql = "INSERT INTO $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }
    
    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}



function update($table, $id, $data)
{
    global $conn;
    $sql = "UPDATE $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }

    $sql = $sql . " WHERE id=?";
    $data['id'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}



function delete($table, $id)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE id=?";

    $stmt = executeQuery($sql, ['id' => $id]);
    return $stmt->affected_rows;
}


function getPublishedPosts()
{
    global $conn;
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? ORDER BY p.created_at DESC";

    $stmt = executeQuery($sql, ['published' => 1]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function formatPostFields($posts)
{
    if (empty($posts)) {
        return [];
    }

    $formattedPosts = [];
    foreach ($posts as $post) {
        $currentPost = $post;
        $currentPost['body'] = html_entity_decode(substr($post['body'], 0, 150) . '...');
        $currentPost['created_at'] = date('F j, Y', strtotime($post['created_at']));
        $currentPost['image'] = BASE_URL . '/assets/images/' . $post['image'];
        array_push($formattedPosts, $currentPost);
    }
    return $formattedPosts;
}

function getPaginatedPosts($currentPage = 1, $recordsPerPage = 3)
{
    global $conn;
    $sql = "SELECT p.*, u.username FROM posts AS p 
            JOIN users AS u ON p.user_id=u.id 
            WHERE p.published=1 
            ORDER BY p.created_at DESC LIMIT ?,?";
    $data = [
        'offset' => ($currentPage - 1) * $recordsPerPage,
        'numberOfRecords' => $recordsPerPage
    ];

    $stmt = executeQuery($sql, $data);
    $posts = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

    return [
        'posts' => formatPostFields($posts),
        'nextPage' => count($posts) < $recordsPerPage ? false : $currentPage + 1,
    ];
}

function get_posts_with_username(){
    global $conn;
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id ORDER BY p.created_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}


function getPostsByTopicId($topic_id)
{
    global $conn;
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND topic_id=? ORDER BY p.created_at DESC";

    $stmt = executeQuery($sql, ['published' => 1, 'topic_id' => $topic_id]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}



function searchPosts($term)
{
    $match = '%' . $term . '%';
    global $conn;
    $sql = "SELECT 
                p.*, u.username 
            FROM posts AS p 
            JOIN users AS u 
            ON p.user_id=u.id 
            WHERE p.published=?
            AND p.title LIKE ? OR p.body LIKE ? ORDER BY p.created_at DESC";


    $stmt = executeQuery($sql, ['published' => 1, 'title' => $match, 'body' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}