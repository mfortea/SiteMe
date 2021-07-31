 // Comprobación y muestra de notificaciones
 window.addEventListener('load', async () => { 
    if (!'serviceWorker' in navigator) {
        console.log('Service Worker NO SOPORTADO')
        return
    }
    console.log('Service Worker es soportado');

    const sw = await navigator.serviceWorker.register('../service-worker.js');
    await subscribe();

    console.log('Listo para recibir notificaciones push')
})

// Suscripción
const subscribe = async () => {
    const serviceWorker = await navigator.serviceWorker.ready; 
    const subscription = await serviceWorker.pushManager.getSubscription(); 

    if (!subscription) {
        console.log('Suscribíendose....');
        const push = await serviceWorker.pushManager.subscribe({ 
            userVisibleOnly: true,
            applicationServerKey: "LA_CLAVE_PUBLICA_VA_AQUI"
        })
        console.log('Suscrito correctamente!. ', push);

        await sendToServer(push);
    }
}

// Persistencia    
const sendToServer = async subData => {
    console.log('Guardando en el servidor...');
    await fetch("RUTA_DEL_SERVIDOR_DE_NOTIFICACIONES", {
        method: "POST",
        headers: {
            'content-type': 'application/json'
        },
        body: JSON.stringify({ sub: subData })
    });
}