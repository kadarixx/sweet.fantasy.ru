let flag = true;
function div_color(div_id) {
    let div1 = document.getElementById(div_id);
    if (flag == true){
        div1.style.borderColor = "#00ff4c";
        flag = false;
    }
    else {
        div1.style.borderColor = "#6c6c6c";
        flag = true;
    }

}