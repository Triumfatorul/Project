var state = 0;
function show_hide() {
    var pass = document.getElementById('pass');
    if(!state){
    pass.setAttribute("type", "text");
    state = 1;
    } else {
        pass.setAttribute("type", "password");
        state = 0;
    }
}