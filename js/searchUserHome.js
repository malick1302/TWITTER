const postInputHome = document.getElementById("post-content-home");
const textAreaHome = document.getElementById("text-area-content-home");

function getContentHome(){
  textAreaHome.value = postInputHome.innerText;
}

function createUsernameListHome(userList)
{
  const n_list = new Array()
  let usernameList = userList;
  let n_input = document.createElement("input")
  let n_datalist = document.createElement("datalist")
  n_input.setAttribute("list", "@userlist")
  n_input.type = "list"
  n_datalist.id ="@userlist"
  usernameList.forEach(element => {
    console.log(element);
    let n_opt = document.createElement("option")
    n_opt.value = element
    n_datalist.appendChild(n_opt)
  })
  postInputHome.appendChild(n_input)
  postInputHome.appendChild(n_datalist)
  n_input.focus()
  n_input.addEventListener("change", () => {
    let selectedName = n_input.value;
    console.log(selectedName);
    postInputHome.removeChild(n_input)
    postInputHome.removeChild(n_datalist)
    postInputHome.innerText += selectedName
  })
}

postInputHome.addEventListener("keydown", (key) =>{
  if(key.key == "@")
    {
      console.log(key.code);
      ajaxUserDisplayHome(null)
    }
})

function ajaxUserDisplayHome(searchValue) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        let json_data = JSON.parse(this.responseText);
        if (json_data["usernames"] != null && searchValue != null) {
        updateSearchInput(
            json_data["usernames"],
            searchValue
          );
        }
        else if (json_data["usernames"] != null)
        {         
          createUsernameListHome(json_data["usernames"]);
        }
      }
    };
    xmlhttp.open("POST", "/Controller/HandleAjax.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
  }

