'use strict';
const CACHE_NAME = 'siteme-cache';

// Archivos necesarios para el funcionamiento offline
const CACHE_ASSETS = [
    '/offline.html',
];

// INSTALL
// Realizamos el cacheo de la APP SHELL
self.addEventListener('install', function(e) {
    console.log("[Service Worker] * Instalado.");

    e.waitUntil(
        caches
        .open(CACHE_NAME)
        .then(function(cache) {
            console.log('[Service Worker] Cacheando app shell');
            return cache.addAll(CACHE_ASSETS);
        })
        .then(function() {
            console.log('[Service Worker] Todos los recursos han sido cacheados');
            return self.skipWaiting();
        })
    );

});


// ACTIVATE
// Eliminamos cachés antiguas.
self.addEventListener('activate', function(e) {
    console.log("[Service Worker] * Activado.");

    e.waitUntil(
        caches
        .keys()
        .then(function(cacheNames) {
            return Promise.all(
                cacheNames.map(function(cacheName) {
                    if (cacheName !== CACHE_NAME) {
                        console.log("[Service Worker] Borrando caché antigua: ", cacheName);
                        return caches.delete(cacheName);
                    }
                })
            )
        })
    );
});


// FETCH
// Hacemos peticiones a recursos.
self.addEventListener('fetch', function(e) {
    console.log("[Service Worker] * Fetch.");

    // if (e.request.mode !== 'navigate') {
    //   // Not a page navigation, bail.
    //   return; 
    // }
    if ((e.request.url.indexOf('/auth/') !== -1 ||
            e.request.url.indexOf('/perfil') !== -1)) {
        return false;
    }

    e.respondWith(
        fetch(e.request)
        .catch(() => {
            return caches.open(CACHE_NAME)
                .then((cache) => {
                    return cache.match('./offline.html');
                });
        })
    );

});


// PUSH
self.addEventListener('push', function(e) {
    // Mantener el service worker a la espera hasta que la notificación sea creada.
    e.waitUntil(
        // Mostrar una notification con título 'Notificación importante' y cuerpo 'Alea iacta est'.
        self.registration.showNotification('Notificación importante', {
            body: 'Alea iacta est',
        })
    );
});



// Generador de las notificaciones
self.addEventListener('push', function (e) {
    const message = e.data.json();

    const options = {
        body: message.body,
        icon: message.icon,
        bagde: message.badge,
        actions: [{
                action: message.action_url,
                title: message.action_title,
                icon: message.action_icon
            },
        ]
    };

    e.waitUntil(self.registration.showNotification(message.title, options));
});


// Acción sobre las notificaciones
self.addEventListener('notificationclick', function (e) {
    console.log('Clic sobre la notificación recibido', e.notification.data);

    e.notification.close();
    e.waitUntil(clients.openWindow(e.notification.data));
});