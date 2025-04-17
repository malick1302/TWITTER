window.addEventListener("load", () => {
    const modModal = document.getElementById("modification-modal");
    const postModal = document.getElementById("post-modal");
    const openModalButton = document.querySelectorAll(".openModal");
    const closeModalButtons = document.querySelectorAll("[data-modal-hide]");
    let currentModal = null;

    openModalButton.forEach(button => {
        button.addEventListener('click', function () {
            if(button.innerHTML == "Modification profil")
            {
                currentModal = "mod";
                modModal.classList.remove("hidden");
            }
            else if(button.innerHTML == "Post")
            {
                currentModal = "post";
                postModal.classList.remove("hidden");
            }
        });
    })

    closeModalButtons.forEach(button => {
        button.addEventListener('click', function () {
            if(currentModal == "mod")
            {
                modModal.classList.add("hidden");
            }
            else if(currentModal == "post")
            {
                postModal.classList.add("hidden");
            }
        });
    });

    
});

function displayPicture() {
    document.getElementById('output').src = window.URL.createObjectURL(document.getElementById("profile-picture").files[0])
    // console.log("PHOTO CHOISIE", document.getElementById("12").files[0])
}


function displayBanner() {
    document.getElementById('outpit').src = window.URL.createObjectURL(document.getElementById("banner-picture").files[0])
    // console.log("PHOTO CHOISIE", document.getElementById("13").files[0])
}