self.addEventListener('install', function(e) {
 e.waitUntil(
   caches.open('airhorner').then(function(cache) {
     return cache.addAll([
       '/',
       '/index.php',
       '/styles/css/main.css?0.98',
       '/styles/css/p.css?0.9',
       '/js/javascript.js?=0.14',
       '/favicon/favicon.ico?v=0.4',
       'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'
     ]);
   })
 );
});

self.addEventListener('fetch', function(event) {
 console.log(event.request.url);

 event.respondWith(
   caches.match(event.request).then(function(response) {
     return response || fetch(event.request);
   })
 );
});
// self.addEventListener('fetch', (event) => {});

