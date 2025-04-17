window.addEventListener("DOMContentLoaded", () => {
   const modal = document.getElementById("default-modal");
   const logoutModal = document.getElementById("default-modal-logout");
   const openModalButtons = document.querySelectorAll(".openModal");
   const openModalButtonsLogout = document.querySelectorAll(".openModal-logout");
   const closeModalButtons = document.querySelectorAll("[data-modal-hide]");
   const closeModalButtonsLogout = document.querySelectorAll(".closeLogout");
   const messageBouton = document.getElementById("new-message-btn")
   const username = document.getElementById("username")
   const convDisplay = document.getElementById("message-handler");
   const defaultConvDisplay = document.getElementById("no-message-default");
   const receiverUsername = document.querySelectorAll(".receiver-username")
   const closeConvButton = document.getElementById("close-conv");
   const send_btn = document.getElementById("send-message")
   const conv = document.querySelectorAll(".conv");
   const messageZone = document.getElementById("messages-zone")
   let receiver = null

   

   if (conv)
   {
      conv.forEach(button => {
         button.addEventListener("click", () => {
            
                  console.log(button.value);
                  receiverUsername.forEach(input =>{
                     input.innerText =button.value;
                     input.value = button.value;
                     receiver = button.value;
                  })
                  ajaxMessage();
                  convDisplay.classList.remove("hidden")
                  defaultConvDisplay.classList.add("hidden")
                  modal.classList.add("hidden")
                  setTimeout(() => {
                     let height = messageZone.clientHeight
                     console.log(height);
                     messageZone.scrollTo(0, height)
                  }, "50")
         })
      })
   }
   
if (messageBouton){
   closeConvButton.addEventListener("click", () => {
         defaultConvDisplay.classList.remove("hidden")
         convDisplay.classList.add("hidden")
      })
   
   messageBouton.addEventListener("click", () => {
      if (username.value.trim() != "")
      {
         console.log(username.value);
         receiverUsername.forEach(input =>{
            input.innerText =username.value;
            input.value = username.value;
            receiver = username.value;
         })
         ajaxMessage();
         convDisplay.classList.remove("hidden")
         defaultConvDisplay.classList.add("hidden")
         modal.classList.add("hidden")
      }
   })
   
   send_btn.addEventListener("click", () => {
      let content = document.getElementById("message-input").value
      let height = messageZone.clientHeight
      console.log(height);
      messageZone.scrollTo(0, height)
      console.log(content);
      if (content.trim())
         ajaxMessage(content);
      document.getElementById("message-input").value = "";
   })   
}

openModalButtonsLogout.forEach(button => {
   document.onclick = (e) => {
      if((button.contains(e.target) && !logoutModal.classList.contains("hidden")) || !button.contains(e.target))
         {
            logoutModal.classList.add("hidden");
         }
         else
         {
            logoutModal.classList.remove("hidden");
         }
   }
});

closeModalButtonsLogout.forEach(button => {
   button.addEventListener("click", () => {
      logoutModal.classList.add("hidden");
   });
});

openModalButtons.forEach(button => {
      button.addEventListener("click", () => {
         modal.classList.remove("hidden");
      });
   });

   closeModalButtons.forEach(button => {
      button.addEventListener("click", function () {
         modal.classList.add("hidden")
      });

   });
   function ajaxMessage(content = null) {
      let xmlhttp = new XMLHttpRequest();
      let receiver_username = receiver;
      let data = `receiver-username=${receiver_username}&message-sended=${content}`;
      xmlhttp.open("POST", "/Controller/HandleAjax.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.onreadystatechange = function () {
         if (this.readyState == 4 && this.status == 200) {
            let json_data = JSON.parse(this.response);
            console.log(json_data);
            if (json_data) {
              renderConversation(
                json_data[1],
                json_data[0]
              );
             }
          }
      };
      xmlhttp.send(data);
    }
});

function renderConversation(messageData, receiver_id)
{
   const messages_container = document.getElementById("messages-zone")
   messages_container.innerHTML = "";
   messageData.forEach((data) => {
      if (data["id_receiver"] == receiver_id)
      {
         messages_container.innerHTML += `<div class="flex justify-end p-2 "><p class="w-fit p-2 border border-solid bg-black text-white rounded-md">${data['content']}</p></div>`
      }
      else
      {
         messages_container.innerHTML += `<div class="text-left p-2 "><p class="p-2 border border-solid dark:border-teal-50 dark:bg-gray-600 bg-gray-300 rounded-md w-fit">${data['content']}</p></div>`
      }
   });
}