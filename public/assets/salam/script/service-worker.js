const CACHE_NAME = 'salam-editor-cache-v1';

const ASSETS_TO_CACHE = [
    // html
    '/',
    
    // salam
    '/assets/salam/salam-wa.js',
    '/assets/salam/salam-wa.wasm',
    '/assets/salam/script/script.js',

    // js
    '/assets/js/jquery-3.7.1.js',

    // images
    '/assets/images/admin.png',
    '/assets/images/arrow-right.svg',
    '/assets/images/favicon.ico',
    '/assets/images/loading.png',
    '/assets/images/salam.svg',
    '/assets/images/salam_logo.png',

    // fonts
    '/assets/fonts/Estedad-Black.ttf',
    '/assets/fonts/Estedad-Bold.ttf',
    '/assets/fonts/Estedad-Light.ttf',
    '/assets/fonts/Estedad-Medium.ttf',
    '/assets/fonts/Estedad-Thin.ttf',
];

// Install Event - Cache the defined assets
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                return cache.addAll(ASSETS_TO_CACHE);
            })
            .then(() => self.skipWaiting())
    );
});

// Activate Event - Clean up old caches
self.addEventListener('activate', event => {
    const cacheWhitelist = [CACHE_NAME];
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.map(cacheName => {
                    if (!cacheWhitelist.includes(cacheName)) {
                        return caches.delete(cacheName);
                    }
                })
            );
        }).then(() => self.clients.claim())
    );
});

// Fetch Event - Serve cached assets, update cache when online
self.addEventListener('fetch', event => {
    event.respondWith(
        caches.match(event.request).then(cachedResponse => {
            const fetchPromise = fetch(event.request).then(networkResponse => {
                if (networkResponse && networkResponse.status === 200) {
                    caches.open(CACHE_NAME).then(cache => {
                        cache.put(event.request, networkResponse.clone());
                    });
                }
                return networkResponse;
            }).catch(() => cachedResponse);
            
            return cachedResponse || fetchPromise;
        })
    );
});
