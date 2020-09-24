apiKey = '', // Jouw Youtube Api Key om data te krijgen. (https://developers.google.com/youtube/v3/getting-started)
cache = { 'live' : 0, 'cached': 0 },
elementToCache = 'currentCached', elementToLive = 'currentLive';


var getText = function (url, callback) {
   var request = new XMLHttpRequest();
   request.onreadystatechange = function () {
       if(request.readyState == 4 && request.status == 200) {
           callback(request.responseText);
       }
   };
   request.open('GET', url);
   request.send();
};

var YTCounter = {};


YTCounter.updateLiveCounter = function() {
   var reqType = (username.length>=24 && username.substr(0, 2).toUpperCase() == "UC")?"id":"forUsername";
   var url = "https://www.googleapis.com/youtube/v3/channels?part=statistics&"+reqType+"="+username+"&fields=items/statistics/subscriberCount&key=" +apiKey;

   getText(url, function(e) {
       e = JSON.parse(e);
       if (typeof e.items[0] != 'undefined') {
          var sub_count = e.items[0].statistics.subscriberCount;
          cache.live = sub_count;
          document.getElementById(elementToLive).innerHTML = cache.live;
       } else {

         getText('https://www.googleapis.com/youtube/v3/search?key=' + apiKey + '&q=' + username + '&part=id&type=channel&maxResults=1', function(e) {
           e = JSON.parse(e);

           if (e.pageInfo['totalResults']) {
             username = e.items[0]['id']['channelId'];
             YTCounter.updateLiveCounter(username);
           } else {
             $('#currentLive').css({'display' : 'none'});
             $('.not-found').css({'display' : 'block'});
           }
         });
       }
   });
}

window.onload = function() {
   YTCounter.updateLiveCounter();
};

setInterval(YTCounter.updateLiveCounter, 1200)
