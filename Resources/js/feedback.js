var dislikeState = 0;
var likeState = 0;
var like_button = document.getElementById('like');
var dislike_button = document.getElementById('dislike');    

function like(){
    if(!likeState){
        like_button.style.backgroundColor = "rgb(0, 162, 255)";
        likeState = 1;
        if(dislikeState){
            dislikeState = 0;
            dislike_button.style.backgroundColor = "rgba(255, 255, 255, 0.651)";
        }
    } else {
        like_button.style.backgroundColor = "rgba(255, 255, 255, 0.651)";
        likeState = 0;
    }
}

function dislike(){
    if(!dislikeState){
        dislike_button.style.backgroundColor = "rgb(0, 162, 255)";
        dislikeState = 1;
        if(likeState){
            likeState = 0;
            like_button.style.backgroundColor = "rgba(255, 255, 255, 0.651)";
        }
    } else {
        dislike_button.style.backgroundColor = "rgba(255, 255, 255, 0.651)";
        dislikeState = 0;
    }
}