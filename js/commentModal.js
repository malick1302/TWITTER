const comment_modal = document.querySelector(".comment_modal")

export function displayCommentModal(tweet_replyed_to){
    comment_modal.classList.remove("translate-y-[-100%]");
    comment_modal.classList.add("translate-y-[0vh]");

    const tweet_content = tweet_replyed_to.querySelector(".tweet_content")
    const tweet_owner_img = tweet_replyed_to.querySelector(".user_image").src;
    const tweet_date = tweet_replyed_to.querySelector(".tweet_date")
    const tweet_username = tweet_replyed_to.querySelector(".tweet_username");
    const tweet_fullname = tweet_replyed_to.querySelector(".tweet_fullname");
    

    comment_modal.querySelector(".tweet_user_image").src = tweet_owner_img //get tweet user image
    comment_modal.querySelector(".tweet_content-comment").innerHTML = tweet_content.innerHTML;
    // comment_modal.querySelector(".tweet_date-comment").innerHTML = tweet_date.innerHTML;
    // comment_modal.querySelector(".tweet_fullname-comment").innerHTML = tweet_fullname.innerHTML;
    // comment_modal.querySelector(".tweet_username-comment").innerHTML = tweet_username.innerHTML;
    // comment_modal.querySelector('.tweet_username2-comment').innerHTML = tweet_username.innerText;
}




export function hideCommentModal(){
    const close_modal = document.querySelector(".close_comment_modal")
    close_modal.addEventListener("click", () => {
        comment_modal.classList.remove("translate-y-[0vh]")
        comment_modal.classList.add("translate-y-[-100%]")
    })
}