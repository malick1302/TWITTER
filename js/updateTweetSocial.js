import { displayCommentModal, hideCommentModal } from "./commentModal.js";


export function updateTweetSocial(buttonClicked) {
    const tweet = buttonClicked.parentNode.parentNode;
    const tweet_id = tweet.id;
    if (buttonClicked.classList.contains("retweet_button")) {
      const retweet_count = buttonClicked.querySelector(".retweet_count")
      if (buttonClicked.classList.contains("activeRetweet")) {
        buttonClicked.classList.remove("activeRetweet");
        retweet_count.innerHTML = parseInt(retweet_count.innerHTML) - 1;
        ajaxRetweetUpdate("undo-retweet", tweet_id);
      } else {
        buttonClicked.classList.add("activeRetweet");
        retweet_count.innerHTML = parseInt(retweet_count.innerHTML) + 1;
        ajaxRetweetUpdate("retweet", tweet_id);
      }
    } else if (buttonClicked.classList.contains("like_button")) {
      const like_count = buttonClicked.querySelector(".like_count")
      if (buttonClicked.classList.contains("activeLike")) {
        buttonClicked.classList.remove("activeLike");
        like_count.innerHTML = parseInt(like_count.innerHTML) - 1;
        ajaxLikeUpdate("undo-like", tweet_id);
      } else {
        buttonClicked.classList.add("activeLike");
        like_count.innerHTML = parseInt(like_count.innerHTML) + 1;
        ajaxLikeUpdate("like", tweet_id);
      }
    } else if (buttonClicked.classList.contains("comment_button")) {
      const tweet_replyed_to = buttonClicked.parentNode.parentNode;
      const comment_modal = document.querySelector(".comment_modal")
      const comment_count = buttonClicked.querySelector(".comment_count")
      const submit_comment = document.getElementById("submit_comment");
      displayCommentModal(tweet_replyed_to);
      hideCommentModal();
      submit_comment.addEventListener("click", (e) => {
        // e.preventDefault();
        const comment_textarea = document.getElementById("reply");
        const comment_text = comment_textarea.value;
        ajaxCommentUpdate(comment_text, tweet_replyed_to.id);
        console.log(tweet_replyed_to.id);
        comment_modal.classList.remove("translate-y-[20vh]")
        comment_modal.classList.add("translate-y-[-100%]")
      })
      // comment_count.innerHTML = parseInt(comment_count.innerHTML) + 1;
    }
  }
   
  function ajaxLikeUpdate(action, tweet_id) {
    const params = `action=${action}&tweet_id=${tweet_id}`;
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        let json_data = JSON.parse(this.responseText);
        const tweet_likes = document.querySelectorAll(".tweet_likes");
        tweet_likes.innerHTML = json_data["likes_number"];
      }
    };
    xmlhttp.open("POST", "/Controller/HandleAjax.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(params);
  }
   
  function ajaxRetweetUpdate(action, tweet_id) {
    const params = `action=${action}&tweet_id=${tweet_id}`;
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        let json_data = JSON.parse(this.responseText);
        const tweet_shares = document.querySelectorAll(".tweet_shares");
        tweet_shares.innerHTML = json_data["shares_number"];
      }
    };
    xmlhttp.open("POST", "/Controller/HandleAjax.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(params);
  }
  
  function ajaxCommentUpdate(comment_text, tweet_id_replyed_to){
    const params = `post-comment=${comment_text}&tweet_id_replyed_to=${tweet_id_replyed_to}`;
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        let json_data = JSON.parse(this.responseText);
        console.log(json_data);
      }
    };
    xmlhttp.open("POST", "/Controller/HandleAjax.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(params);
  }