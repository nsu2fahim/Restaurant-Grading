const check = () => {
    if (!('serviceWorker' in navigator)) {
        throw new Error('No Service Worker support!')
    }
    if (!('PushManager' in window)) {
        throw new Error('No Push API Support!')
    }
}

const requestNotificationPermission = async () => {
    const permission = await window.Notification.requestPermission();
    // value of permission can be 'granted', 'default', 'denied'
    if(permission !== 'granted'){
        throw new Error('Permission not granted for Notification');
    }
}

const registerServiceWorker = async () => {
    const swRegistration = await navigator.serviceWorker.register('service-worker.js');
    return swRegistration;
}

const main = async () => {
    check();
    const swRegistration = await registerServiceWorker();
    const permission =  await requestNotificationPermission();
    
}

main()