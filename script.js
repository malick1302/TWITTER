import { tweetParser } from "./js/tweetParser.js";
import { checkIfUserLiked, checkIfUserRetweet, checkIfFollowedRetweet } from "./js/checkSocial.js";
import { updateTweetSocial } from "./js/updateTweetSocial.js";

const tweets_container = document.querySelector(".tweets");
const url = window.location.href;
const actualPage = url.split("=")[1]; 

async function renderTimeline() {
  ajaxTimeline(null, 1);
}

if (actualPage === "home" || actualPage === "profile") {
  renderTimeline().then(() => {
    bindSocialButtonEvents();

    if (actualPage === "home") {
      setInterval(() => {
        const lastTweet = document.querySelector(".tweets .tweet");
        ajaxTimeline(lastTweet?.id, 0);
      }, 10000);
    }
  });
}

function bindSocialButtonEvents() {
  const social_buttons = document.querySelectorAll(".social_buttons div");
  social_buttons.forEach(button => {
    button.addEventListener("click", () => updateTweetSocial(button));
  });
}

function ajaxTimeline(last_tweet_id, isFirstRender) {
  const xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      const jsonData = JSON.parse(this.responseText);
      const newTweets = jsonData.tweets;
      if (newTweets.length === 0) return;

      const latestTweetId = newTweets[0].id;
      console.log(jsonData);
      if (latestTweetId !== last_tweet_id) {
        renderTweets(
          newTweets,
          jsonData.usernames,
          jsonData.pictures,
          jsonData.allTweetsLikesInfo,
          jsonData.allTweetsRetweetInfo,
          jsonData.actual_user_id,
          jsonData.user_follows,
          newTweets[0].reply_to,
          isFirstRender
        );
        bindSocialButtonEvents();
      }
    }
  };

  xmlhttp.open("POST", "/Controller/HandleAjax.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send();
}

function renderTweets(tweets, usernames, pictures, likesInfo, retweetInfo, actualUserId, userFollows, isLastTweetAComment, isFirstRender) {
  let container = tweets_container;

  if (actualPage === "profile") {
    container = document.querySelectorAll(".tab-panel");
  }

  if (isFirstRender) {
    constructTweets(tweets, usernames, pictures, likesInfo, retweetInfo, userFollows, actualUserId, container);
  } else {
    if (isLastTweetAComment === "null") {
      const refresh_btn = document.querySelector("#refresh_button");
      refresh_btn?.classList.remove("hidden");

      refresh_btn?.addEventListener("click", () => {
        constructTweets(tweets, usernames, pictures, likesInfo, retweetInfo, userFollows, actualUserId, container);
        refresh_btn.classList.add("hidden");
      });
    }
  }
}

function constructTweets(tweets, usernames, pictures, likesInfo, retweetInfo, userFollows, actualUserId, container) {
  if (!tweets || tweets.length === 0) return;

  if (container.length > 0) {
    container.forEach(tab => {
      if (tab.id === "tab-4") {
        return;
      }
      tab.innerHTML = "";

      let filteredTweets = tweets;

      if (tab.id === "tab-1") { //posts
        console.log(retweetInfo);
        filteredTweets = tweets.filter((tweet) => {
          return retweetInfo.some((element) => {
            return element.id_tweet === tweet.id && element.id_user === actualUserId || tweet.id_user == actualUserId;
          });
        });
      } else if (tab.id === "tab-2") { //replies
        filteredTweets = tweets.filter((tweet) => {
          return likesInfo.some((element) => {
            return element.id_tweet === tweet.id && element.id_user === actualUserId;
          });
        });
      } else if (tab.id === "tab-3") { //likes
        filteredTweets = tweets.filter((tweet) => {
          return likesInfo.some((element) => {
            return element.id_tweet === tweet.id && element.id_user === actualUserId;
          });
        });
      }

      filteredTweets.forEach(tweet => {
        tab.innerHTML += createTweetHTML(tweet, usernames, pictures, likesInfo, retweetInfo);
        checkIfUserLiked(likesInfo, tweet.id, actualUserId);
        checkIfUserRetweet(retweetInfo, tweet.id, actualUserId);
        checkIfFollowedRetweet(userFollows, retweetInfo, tweet.id);
      });
    });
  }

  else {
    container.innerHTML = "";
    tweets.forEach(tweet => {
      if (tweet.reply_to == null)
      {
        container.innerHTML += createTweetHTML(tweet, usernames, pictures, likesInfo, retweetInfo);
        checkIfUserLiked(likesInfo, tweet.id, actualUserId);
        checkIfUserRetweet(retweetInfo, tweet.id, actualUserId);
        checkIfFollowedRetweet(userFollows, retweetInfo, tweet.id);
      }
    });
  }
}

function createTweetHTML(tweet, usernames, pictures, likesInfo, retweetInfo) {
  const userPicture = getUserPicture(tweet.username, pictures);
  const parsedContent = tweetParser(tweet.content, usernames);
  const likesCount = getTweetLikes(likesInfo, tweet.id);
  const retweetCount = getTweetRetweets(retweetInfo, tweet.id);

  return `
    <div id="${tweet.id}" class="tweet flex flex-col items-start p-2 border border-black  bg-white  dark:bg-slate-950 dark:border dark:border-slate-900 m-0 ml-10 mr-10 rounded-none dark:text-teal-50">
      <div class="retweetUser italic text-gray-500 text-xs flex items-center dark:text-teal-50"></div>
      <div class="flex gap-2 mb-2 text-s font-bold tracking-tight text-gray-900 dark:text-white">
        <img src="${userPicture}" class="user_image w-10 h-10 rounded-full object-cover" alt="">
        <p>${tweet.display_name}</p>
        <a class="text-gray-600 italic" href="?page=profile/${tweet.username}">@${tweet.username}</a>
        <span>${tweet.creation_date}</span>
      </div>
      <div class="tweet_content ml-10">${parsedContent}</div>
      <img src="" alt="">
      <div class="social_buttons flex items-center justify-around w-full mt-[15px]">
        ${createSocialButton("comment", "blue", 0)}
        ${createSocialButton("retweet", "green", retweetCount)}
        ${createSocialButton("like", "red", likesCount)}
      </div>
    </div>
  `;
}

function createSocialButton(type, color, count) {
  return `
    <div class="flex items-center group hover:text-${color}-600 hover:cursor-pointer ${type}_button">
      <span class="p-[7px] group-hover:bg-${color}-500 group-hover:bg-opacity-25 rounded-full">
        ${getButtonIcon(type)}
      </span>
      <span class="${type}_count ml-[-5px]">${count}</span>
    </div>
  `;
}

function getButtonIcon(type) {
  switch (type) {
    case "comment":
      return `
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
        </svg>`;
    case "retweet":
      return `
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
        </svg>
      `;
    case "like":
      return `
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
        </svg>
      `;
  }
}
function getTweetLikes(tweetsLikesInfo, tweet_id){
  let totalLikes = 0;
  tweetsLikesInfo.forEach(tweetInfo => {
    if (tweetInfo["id_tweet"] == tweet_id) {
      totalLikes++;
    }
  })
  return totalLikes;
}

function getTweetRetweets(tweetsRetweetsInfo, tweet_id){
  let totalRetweets = 0;
  tweetsRetweetsInfo.forEach(tweetInfo => {
    if (tweetInfo["id_tweet"] == tweet_id) {
      totalRetweets++;
    }
  })
  return totalRetweets;
}

function getUserPicture(username, pictures_arr)
{
  if (username in pictures_arr)
    return pictures_arr[username];
}

document.addEventListener("DOMContentLoaded", function() {
  const skeletons = document.querySelectorAll('.skeleton');
  setTimeout(() => {
    skeletons.forEach((skeleton) => {
      skeleton.classList.add('hidden');
    });
  }, 500); 
});
