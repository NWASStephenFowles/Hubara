// This is the "Offline page" service worker

const CACHE = "NWAS Hubara";

// TODO: replace the following with the correct offline fallback page i.e.: const offlineFallbackPage = "offline.html";
const offlineFallbackPage = "index.php";

self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open('v1.5').then(function(cache) {
      return cache.addAll([
        '/',
        '/index.php',
        '/css/Core.css',
        '/css/Layout.css',
        '/css/bootstrap/5.0.2/Default/css/bootstrap.min.css',
        '/css/Palette.css',
        '/css/Palette-Dark-Mode.css',
        '/css/Palette-Light-Mode.css',
        '/img/Corp_Logo.png',
        '/img/Corp_Logo-White.png',
        '/img/AppLogo.png'
      ]);
    })
  );
});

self.addEventListener('fetch', function(event) {
  event.respondWith(caches.match(event.request).then(function(response) {
    // caches.match() always resolves
    // but in case of success response will have value
    if (response !== undefined) {
      return response;
    } else {
      return fetch(event.request).then(function (response) {
        // response may be used only once
        // we need to save clone to put one copy in cache
        // and serve second one
        let responseClone = response.clone();
        
        caches.open('v1').then(function (cache) {
          cache.put(event.request, responseClone);
        });
        return response;
      }).catch(function () {
        return caches.match('/img/AppSplash_2-9.jpg');
      });
    }
  }));
});

// This is an event that can be fired from your page to tell the SW to update the offline page
self.addEventListener("refreshOffline", function () {
  const offlinePageRequest = new Request(offlineFallbackPage);

  return fetch(offlineFallbackPage).then(function (response) {
    return caches.open(CACHE).then(function (cache) {
      console.log("[NWAS SafeCheck] Offline page updated from refreshOffline event: " + response.url);
      return cache.put(offlinePageRequest, response);
    });
  });
});
