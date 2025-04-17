export function checkIfUserLiked(tweetsLikesInfo, tweet_id, actual_user_id) {
  tweetsLikesInfo.forEach((element) => {
    for (const [key, value] of Object.entries(element)) {
      if (key == "id_tweet" && value == tweet_id) {
        if (element["id_user"] == actual_user_id) {
          const tweet = document.getElementById(tweet_id);
          const like_button = tweet.querySelector(".like_button");
          like_button.classList.add("activeLike");
        }
      }
    }
  });
}

export function checkIfUserRetweet(
  tweetsRetweetInfo,
  tweet_id,
  actual_user_id
) {
  tweetsRetweetInfo.forEach((element) => {
    for (const [key, value] of Object.entries(element)) {
      if (key == "id_tweet" && value == tweet_id) {
        if (element["id_user"] == actual_user_id) {
          const tweet = document.getElementById(tweet_id);
          const like_button = tweet.querySelector(".retweet_button");
          like_button.classList.add("activeRetweet");
        }
      }
    }
  });
}

export function checkIfFollowedRetweet(user_follows, tweetsRetweetInfo){
  user_follows.forEach((follow) => {
    tweetsRetweetInfo.forEach(element => {
      if (element["id_user"] == follow["id"]) {
        const tweet = document.getElementById(element["id_tweet"]);
        if (tweet) {
          const retweetUserSpan = tweet.querySelector(".retweetUser") 
          retweetUserSpan.innerHTML = `
            ${follow["username"]}
            retweeted
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3 ml-[3px]">
              <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
            </svg>
          `;
        }
      }
    });
  });
}
