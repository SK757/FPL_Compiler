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