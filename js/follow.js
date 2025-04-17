window.addEventListener("DOMContentLoaded", () => {
    const follow_btn = document.getElementById("follow-btn");
    const follows = document.getElementById("follows");
    
    if (follow_btn != null)
    {
      follow_btn.addEventListener("click", () => {
          if (follow_btn.innerHTML == "Unfollow" || follow_btn.innerHTML == "Followed")
          {
            ajaxFollow("U");
            follows.innerHTML = parseInt(follows.innerHTML) - 1;
            follow_btn.innerHTML = "Follow";
          }
          else if (follow_btn.innerHTML == "Follow")
          {
            ajaxFollow("F");
            follows.innerHTML = parseInt(follows.innerHTML) + 1;
            follow_btn.innerHTML = "Followed";
          }
      })
  
      follow_btn.addEventListener("mouseover", () =>{
          if (follow_btn.innerHTML == "Followed")
              follow_btn.innerHTML = "Unfollow";
      })
  
      follow_btn.addEventListener("mouseleave", () =>{
          if (follow_btn.innerHTML == "Unfollow")
              follow_btn.innerHTML = "Followed";
      })
    }

  });

  function getCookie(name) {
    let nameEQ = name + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}
  
    function ajaxFollow(status) {
    let xmlhttp = new XMLHttpRequest();
    let follow_id = document.getElementById("follow-id").innerText;
    let user_id = getCookie("user_id");
    let data = `follow_id=${follow_id}&user_id=${user_id}&state=${status}`;
    xmlhttp.open("POST", "/Controller/HandleAjax.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = function () {
      console.log(JSON.parse(this.responseText));
    };
    xmlhttp.send(data);
  }