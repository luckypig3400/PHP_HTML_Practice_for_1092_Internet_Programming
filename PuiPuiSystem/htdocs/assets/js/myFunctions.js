//https://www.w3schools.com/howto/howto_js_toggle_text.asp
function changePGtext() {
    var x = document.getElementById("playgroundText");
    var btn = document.getElementById("IseeU_btn");
    if (x.innerHTML == "你看不到我~~ o(*////▽////*)q") {
        x.innerHTML = "哇OAO被你看光光惹`(*>﹏<*)′";
        btn.innerHTML = "把我藏起來OwO";
    } else {
        x.innerHTML = "你看不到我~~ o(*////▽////*)q";
        btn.innerHTML = "我看的到你";
    }
}

//https://www.w3schools.com/howto/howto_js_toggle_dark_mode.asp
function toggleDM(){
    var element = document.body;
    element.classList.toggle("dark-mode");
}