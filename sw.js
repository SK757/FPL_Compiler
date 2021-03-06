const CACHE_NAME = "v1.6";
const urlsToCache = [ '/', '/p', '/team', '/history', '/strength', '/offline.html', '/favicon/favicon.ico' ];

const self = this;

//install sw
self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then((cache) => {
        console.log('Opened cache');

        return cache.addAll(urlsToCache);
      })
  );
});

//listen for requests
self.addEventListener('fetch', (event) => {
  event.respondWith(
    caches.match(event.request)
     .then(() => {
      return fetch(event.request)
        .catch(() => caches.match('offline.html'));
     })
  );
});

// activate sw
self.addEventListener('activate', (event) => {
  const cacheWhitelist = [];
  cacheWhitelist.push(CACHE_NAME);

  event.waitUntil(
    caches.keys().then((cacheNames) => Promise.all(
      cacheNames.map((cacheName) => {
        if(!cacheWhitelist.includes(cacheName)) {
          return caches.delete(cacheName);
        }
      })
    ))
  );

});
