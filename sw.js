importScripts("https://storage.googleapis.com/workbox-cdn/releases/5.1.2/workbox-sw.js");

const { enable } = workbox.navigationPreload;
const { registerRoute, NavigationRoute } = workbox.routing;
const { NetworkOnly } = workbox.strategies;
const { skipWaiting, clientsClaim } = workbox.core;

workbox.core.skipWaiting();
workbox.core.clientsClaim();

const CACHE_NAME = 'offline_0.1';
const FALLBACK_HTML_URL = '/offline.html';

self.addEventListener('install', async (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then((cache) => cache.add(FALLBACK_HTML_URL))
  );
});

enable();

const networkOnly = new NetworkOnly();
const navigationHandler = async (params) => {
  try {
    return await networkOnly.handle(params);
  } catch (error) {
    return caches.match(FALLBACK_HTML_URL, {
      cacheName: CACHE_NAME,
    });
  }
};

// // activate sw
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

registerRoute(
  new NavigationRoute(navigationHandler)
);


// const { registerRoute, setDefaultHandler, setCatchHandler } = workbox.routing;
// const { CacheFirst, NetworkFirst, StaleWhileRevalidate } = workbox.strategies;
// const { CacheableResponse } = workbox.cacheableResponse;
// const { matchPrecache, precacheAndRoute } = workbox.precaching;
// const { skipWaiting, clientsClaim } = workbox.core;

// workbox.core.skipWaiting();
// workbox.core.clientsClaim();

// precacheAndRoute([
//   {url: '/offline.html', revision: 'null' },
// ]);

// // setDefaultHandler(new StaleWhileRevalidate());
// // setCatchHandler(async ({event}) => {
// // switch (event.request.destination) {
// //     case 'document':
// //       // If using precached URLs:
// //       // return matchPrecache(FALLBACK_HTML_URL);
// //       return caches.match('/offline.html');
// //     break;
// //     }
// //   });

// // HTML cache, always go to the network first (to ensure it's the latest content)
// registerRoute(
//   ({ request }) => request.destination === "document",
//   new NetworkFirst({
//     cacheName: "html-cache",
//     cacheExpiration: {
//       maxEntries: 3,
//     },
//   })
// );

// // JS cache, go to the cache first only use network if no matching file is cached
// registerRoute(
//   ({ request }) => request.destination === "script",
//   new CacheFirst({
//     cacheName: "js-cache",
//     cacheExpiration: {
//       maxEntries: 1,
//     },
//   })
// );

// // JS cache, go to the cache first only use network if no matching file is cached
// registerRoute(
//   ({ request }) => request.destination === "style",
//   new CacheFirst({
//     cacheName: "css-cache",
//     cacheExpiration: {
//       maxEntries: 1,
//     },
//   })
// );

// // Third Party JS cache, go to the cache first only use network if no matching file is cached
// registerRoute(
//   ({ request }) => request.url.includes("https://unpkg.com"),
//   new CacheFirst({
//     cacheName: "js-third-party-cache",
//     cacheExpiration: {
//       maxEntries: 5,
//     },
//   })
// );

// const version = "v1.89";
// self.addEventListener('activate', function(event) {
//   event.waitUntil(
//     caches
//       .keys()
//       .then(keys => keys.filter(key => !key.endsWith(version)))
//       .then(keys => Promise.all(keys.map(key => caches.delete(key))))
//   );
// });

// ***
// *****
// *****
// *****


// const CACHE_NAME = "v1.87";
// const urlsToCache = ['/offline.html', '/favicon/favicon.ico' ];

// const self = this;

// //install sw
// self.addEventListener('install', (event) => {
//   event.waitUntil(
//     caches.open(CACHE_NAME)
//       .then((cache) => {
//         console.log('Opened cache');

//         return cache.addAll(urlsToCache);
//       })
//   );
// });

// //listen for requests
// self.addEventListener('fetch', (event) => {
//   event.respondWith(
//     caches.match(event.request)
//      .then(() => {
//       return fetch(event.request)
//         .catch(() => caches.match('offline.html'));
//      })
//   );
// });

// // activate sw
// self.addEventListener('activate', (event) => {
//   const cacheWhitelist = [];
//   cacheWhitelist.push(CACHE_NAME);

//   event.waitUntil(
//     caches.keys().then((cacheNames) => Promise.all(
//       cacheNames.map((cacheName) => {
//         if(!cacheWhitelist.includes(cacheName)) {
//           return caches.delete(cacheName);
//         }
//       })
//     ))
//   );

// });
