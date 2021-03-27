self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open('cache').then((cache) => {
      return cache.addAll([
        "/",
        "/index.php",
        "/p",
        "/team",
        "/history",
        "/strength",
        "/php/dates.php",
        "/php/points.php",
        "/php/teamPoints.php",
        "/styles/css/main.css?=0.98",
        "/styles/css/p.css?=0.9",
        "/js/javascript.js?=0.89",
        "/js/change.js?=1.1",
        "/js/sortable.js?=0.02",
        "/js/strength.js?=0.89",
        "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"
      ]);
    })
  );
});

self.addEventListener('fetch', function(event) {
  event.respondWith(async function() {
    try {
      var res = await fetch(event.request);
      var cache = await caches.open('cache');
      cache.put(event.request.url, res.clone());
      return res;
    }
    catch(error) {
      return caches.match(event.request);
    }
  }());
});