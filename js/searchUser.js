const searchBar = document.getElementById("search-input")
const searchList = document.getElementById("searchList")
const postInput = document.getElementById("post-content");
const textArea = document.getElementById("text-area-content");

function getContent(){
  textArea.value = postInput.innerText;
}

// function createUsernameList(userList)
// {  
//   const n_list = new Array()
//   let usernameList = userList;
//   let n_input = document.createElement("input")
//   let n_datalist = document.createElement("datalist")
//   n_input.setAttribute("list", "@userlist")
//   n_input.type = "list"
//   n_datalist.id ="@userlist"
//   usernameList.forEach(element => {
//     console.log(element);
//     let n_opt = document.createElement("option")
//     n_opt.value = element
//     n_datalist.appendChild(n_opt)
//   })
//   postInput.appendChild(n_input)
//   postInput.appendChild(n_datalist)
//   n_input.focus()
//   n_input.addEventListener("change", () => {
//     let selectedName = n_input.value;
//     console.log(selectedName);
//     postInput.removeChild(n_input)
//     postInput.removeChild(n_datalist)
//     postInput.innerText += selectedName
//   })
// }

postInput.addEventListener("keydown", (key) =>{
  if(key.key == "@")
    {
      console.log(key.code);
      ajaxUserDisplay(null)
    }
})

searchBar.addEventListener("keypress", (key) => {
  if(key.key == "@")
    {
      searchBar.addEventListener("keyup", () => {
        if (searchBar.value.trim() != "")
          {
            let actual_children = searchList.childNodes
            if(actual_children)
            {
                searchList.innerHTML = ""
            }
            searchList.classList.remove("hidden")
            ajaxUserDisplay(searchBar.value.substring(1), "user");
        }
        else if(searchBar.value.trim() == "")
        {
            let actual_children = searchList.childNodes
            if(actual_children)
              {
                console.log(actual_children);
                actual_children.forEach(child => {
                    searchList.removeChild(child);
                })
            }
            searchList.classList.add("hidden")
        }
    })
    }
  else if (key.key == "#")
  {
    searchBar.addEventListener("keyup", () => {
      if (searchBar.value.trim() != "")
        {
          let actual_children = searchList.childNodes
          if(actual_children)
          {
              searchList.innerHTML = ""
          }
          searchList.classList.remove("hidden")
          ajaxUserDisplay(searchBar.value.substring(1), "hashtag");
      }
      else if(searchBar.value.trim() == "" || searchBar.value == null)
      {
          let actual_children = searchList.childNodes
          if(actual_children)
            {
              console.log(actual_children);
              actual_children.forEach(child => {
                  searchList.removeChild(child);
              })
          }
          searchList.classList.add("hidden")
      }
  })
  }
})

function ajaxUserDisplay(searchValue, type) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        let json_data = JSON.parse(this.responseText);
        if (json_data["usernames"] != null && json_data["hashtags"] && searchValue != null) {
          // console.log(json_data["hashtags"]);
        updateSearchInput(
            json_data["usernames"],
            json_data["hashtags"],
            type,
            searchValue
          );
        }
        // else if (json_data["usernames"] != null)
        // {         
        //   createUsernameList(json_data["usernames"]);
        // }
      }
    };
    xmlhttp.open("POST", "/Controller/HandleAjax.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();

  }

  function updateSearchInput(usernames, hashtags, type, searchValue)
  {
    const foundnames = new Array();
    if(type == "user")
    {
      usernames.forEach(element => {
         if(element.startsWith(searchValue) != false)
              foundnames.push(element)
         });
         console.log(foundnames);
         foundnames.forEach(name => {
          let profile_element = document.createElement("li")
          profile_element.classList.add("hover:bg-white","text-lg", "w-full")
          let profile_link = document.createElement("a")
          profile_link.classList.add("w-full", "text-xl")
          profile_link.setAttribute("href", `?page=profile/${name}`)
          profile_link.innerText = name;
          profile_element.appendChild(profile_link);
          searchList.appendChild(profile_element);
         })
    }
    else if (type == "hashtag")
    {
      hashtags.forEach(element => {
        if(element.startsWith(searchValue) != false)
             foundnames.push(element)
        });
        console.log(foundnames);
        foundnames.forEach(name => {
         let profile_element = document.createElement("li")
         profile_element.classList.add("hover:bg-white","text-lg", "w-full")
         let profile_link = document.createElement("a")
         profile_link.classList.add("w-full", "text-xl")
         profile_link.setAttribute("href", `?page=search/${name}`)
         profile_link.innerText = name;
         profile_element.appendChild(profile_link);
         searchList.appendChild(profile_element);
        })
    }
  }

