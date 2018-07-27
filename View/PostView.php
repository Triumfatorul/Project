
<?php
 
class PostView {
    public static function showAllPosts($data){
                $output = '';
                $output .= '<link rel="stylesheet" href="/Framework/Resources/css/style.css">';
                $output .= '<br><a href="/Framework/posts/create/" class="new_post">Create a new post</a><br><br>';
                $output .= '<div class="content">';
                if(count($data) > 0) {
                    foreach ($data as $value) {
                        $output .= '<div class="post">';
                            $output .= '<h3><a href="/Framework/posts/show/'.$value['id'].'">'.$value['title'].'</a></h3>';
                            $output .= '<small> Written on '.$value['post_date'].' by '.$value['author'].'</small>';
                        $output .= '</div>';
                    }
                } else {
                    $output .= 'No post founds!';
                }
                echo $output;
    }
    
    public static function show($data){
        $output = '';
        $output .= '<a href="../">Back</a><br><br>';
        $output .= '<link rel="stylesheet" href="/Framework/Resources/css/style.css">';
        if($data != ''){
            $output .= '<div class="post">';
            $output .= '<h2>'.$data['title'].'</h2>';
            $output .= '<p>'.nl2br($data['body']).'</p>';
            $output .= '<small> Written on '.$data['post_date'].' by '.$data['author'].' </small>';
            $output .= '<button type="button" onclick="like()" id="like">Like</button>';
            $output .= '<button type="button" onclick="dislike()" id="dislike">Dislike</button><br><br>';
            if($data['author'] == $_SESSION['username']) {
                $output .= '<a href="../edit/'.$data['id'].'" class="edit">Edit</a>';
                $output .= '<a href="../delete/'.$data['id'].'" class="delete">Delete</a>';
            }
            $output .= '</div>';
        } else {
            $output .= 'No post found!';
        }
        $output .= '<script src="/Framework/Resources/js/feedback.js"></script>';
        echo $output;
    }

    public static function showCreateForm() {
        $output = '';
        $output .= '<link rel="stylesheet" href="/Framework/Resources/css/style.css">';
        $output .= '<div class="form">';
        $output .= '<form action="/Framework/posts/store" method="POST" autocomplete="off">';
        $output .= '<input type="text" name="title" placeholder="Insert a post title" required><br>';
        $output .= '<textarea name="body" placeholder="Insert the post content" cols="50" rows="15" required></textarea><br>';
        $output .= '<button type="submit">Submit</button><br>';
        $output .= '</form>';
        $output .= '</div>';

        echo $output;
    }

    public static function showEditForm($data) {
        if($data != NULL) {
            if($data['author'] == $_SESSION['username']) {
            $output = '';
            $output .= '<link rel="stylesheet" href="/Framework/Resources/css/style.css">';
            $output .= '<div class="form">';
            $output .= '<form action="../update/'.$data['id'].'" method="POST" autocomplete="off">';
            $output .= '<input type="text" name="title" placeholder="Insert a post title" value="'.$data['title'].'" required><br>';
            $output .= '<textarea name="body" placeholder="Insert the post content" cols="50" rows="15" required>'.$data['body'].'</textarea><br>';
            $output .= '<button type="submit">Submit</button><br>';
            $output .= '</form>';
            $output .= '</div>';

            echo $output;
            } else {
                header("location: /Framework/");
            }
        } else {
            echo 'Error! Please try again!<br> <a href="../">Back</a><br><br>';
            
        }
    }
}
