const CACHE_NAME = 'salam-cache-v1';

const ASSETS_TO_CACHE = [
	'/site.webmanifest',

	// style
	'/style/style.css',

	// script
	'/script/script.js',

	// salam
	'/salam-wa.js',
	'/salam-wa.wasm',

	// images
	'/image/android-chrome-192x192.png',
	'/image/android-chrome-512x512.png',
	'/image/apple-touch-icon.png',
	'/image/favicon-16x16.png',
	'/image/favicon-32x32.png',
	'/image/favicon.ico',

	'/image/theme-light.jpg',
	'/image/theme-dark.jpg',

	'/image/view-full.jpg',
	'/image/view-split.jpg',

	'/image/image/screenshot.jpg',
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
