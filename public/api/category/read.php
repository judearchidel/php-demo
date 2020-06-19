<?php

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        include_once '../../config/Database.php';
        include_once '../../models/category.php';

        $database = new Database();
        $db = $database->connect();

        $post = new Category($db);


        $result = $post->read();

        $num = $result->rowCount();

        if($num > 0) {
            $post_arr = array();
            //$post_arr['data'] = array();
            
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $post_item = array(
                    'id' => $id,
                    'name' => $name,
                    'created_at' => $created_at
                );

                array_push($post_arr, $post_item);
            }

            echo json_encode($post_arr);


        } else {
            echo json_encode(
                array('message' => 'No Posts Found')
            );
        }