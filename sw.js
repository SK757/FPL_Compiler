self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open('cache').then((cache) => {
      return cache.addAll([
        "/",
        "/index.php",
        "/php/dates.php",
        "/php/points.php",
        "/php/teamPoints.php",
        "/styles/css/main.css",
        "/styles/css/p.css",
        "/js/javascript.js",
        "/js/change.js",
        "/js/sortable.js",
        "/js/strength.js"
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