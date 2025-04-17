export function tweetParser(content, existing_usernames) {
    const content_array = content.split(" ");
    let wordIndex = 0;
    content_array.forEach(word => {
      if (word[0] == "@") {
        wordIndex = content_array.indexOf(word);
        const username_sanitize = word.substring(1);
        if (existing_usernames.includes(username_sanitize)) {
          content_array[wordIndex] = `<a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="/?page=profile/${username_sanitize}">${word}</a>`;
        }
      } else if (word[0] == "#") {
        wordIndex = content_array.indexOf(word);
        const hashtag_sanitize = word.substring(1);
        content_array[wordIndex] = `<a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="/?page=search/${hashtag_sanitize}">${word}</a>`;
      }
    });
    return content_array.join(" ");
}