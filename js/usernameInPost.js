const postInput = document.getElementById("post-content");

function ajaxFollow() {
    let xmlhttp = new XMLHttpRequest();
    let data = `post-content=@`;
    xmlhttp.open("POST", "/Controller/HandleAjax.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
           let json_data = JSON.parse(this.response);
           console.log(json_data);
         }
     };
    xmlhttp.send(data);
  }

function createUsernameList(userList)
{

}

postInput.addEventListener("keypress", (key) =>{
    if(key.key == "@")
    {
        console.log(key.code);
        ajaxFollow();
    }
})