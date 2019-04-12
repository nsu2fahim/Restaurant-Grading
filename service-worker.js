const urlB64ToUint8Array = base64String => {
    const padding = '='.repeat((4 - (base64String.length % 4)) % 4)
    const base64 = (base64String + padding).replace(/\-/g, '+').replace(/_/g, '/')
    const rawData = atob(base64)
    const outputArray = new Uint8Array(rawData.length)
    for (let i = 0; i < rawData.length; ++i) {
      outputArray[i] = rawData.charCodeAt(i)
    }
    return outputArray
}
var sw = new EventSource("http://localhost:8888/restaurant-grading/service_workers/serviceStream.php");


self.addEventListener('activate', async () => {
    // This will be called only once when the service worker is activated.
    try {
        const applicationServerKey = urlB64ToUint8Array(
            'BDJ3oo-_0ZXldOqH5IsBRj9-VgiI9oaB_6UP1IWVXlOgxDYEbOWpK9am6b2kzmWSiUk-TZL_SsEiQlvbycXD2-o'
        )
        const options = { applicationServerKey, userVisibleOnly: true }
        const subscription = await self.registration.pushManager.subscribe(options)
        console.log(JSON.stringify(subscription))
      } catch (err) {
        // console.log('Error', err)
      }
});

cnt = 0
sw.addEventListener('push', function(event) {
    if (event.data) {
        cnt += 1;
        body = 'Check out the newest Restaurants from Gulshan now!!';
        const options = {
            body,
            // here you can add more properties like icon, image, vibrate, etc.
        }
        self.registration.showNotification('Hey, '+ event.data, options)
        console.log('Push event!! ', event.data, ' cnt: ', cnt);
        if(cnt > 0){
            this.removeEventListener('push', arguments.callee, false);
        }
    } else {
      console.log('Push event but no data')
    }
});


