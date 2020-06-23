<?php
       /* function customError($errno, $errstr) {
        
        $error =  "<b>Error:</b> [$errno] $errstr";

        $log_file = "/dev/stderr"; 
        ini_set("log_errors", TRUE);
        ini_set('error_log', $log_file); 

        errorMessage($error);
 
        error_log($error); 
        return true;
        } 

        function fatalShutdown() {
        
        $log_file = "/dev/stderr"; 
        ini_set("log_errors", TRUE);   
        ini_set('error_log', $log_file); 
        
        $error = print_r(error_get_last()['message'],true);

        if(!$error){
            $error =$error . "Read operation completed";
        }
        
        errorMessage($error);

        error_log($error); 
        }

        register_shutdown_function('fatalShutdown');

        set_error_handler("customError");*/

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        include_once '../../config/Database.php';
        include_once '../../models/Post.php';

        $database = new Database();
        $db = $database->connect();

        $post = new Post($db);


        $result = $post->read();

        $num = $result->rowCount();

        if($num > 0) {
            $post_arr = array();
            //$post_arr['data'] = array();
            
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $post_item = array(
                    'id' => $id,
                    'title' => $title,
                    'body' => html_entity_decode($body),
                    'author' => $author,
                    'category_id' => $category_id,
                    'category_name' => $category_name
                );

                array_push($post_arr, $post_item);
            }

            echo json_encode($post_arr);

        } else {
            echo json_encode(
                array('message' => 'No Posts Found')
            );
        }
    
     function errorMessage($error){
        $logMsg = "Subscription; user: " . $error .PHP_EOL;
        file_put_contents('server.log', $logMsg, FILE_APPEND | LOCK_EX);
        
        /*
        // path of the log file where errors need to be logged 
        $log_file = "/dev/stderr"; 
  
        // setting error logging to be active 
        ini_set("log_errors", TRUE);  
  
        // setting the logging file in php.ini  
        ini_set('error_log', $log_file); 
  
        // logging the error 
        error_log($error); 
        */
    }
?>