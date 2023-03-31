importScripts('https://www.gstatic.com/firebasejs/3.9.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/3.9.0/firebase-messaging.js');

// Initialize the Firebase app in the service worker by passing in the
// messagingSenderId.
firebase.initializeApp({

  apiKey: "AIzaSyAM5eq0ZuamAwKxux8eW2GC4IfOZdPffk4",
  authDomain: "laravel-test-51843.firebaseapp.com",
  projectId: "laravel-test-51843",
  storageBucket: "laravel-test-51843.appspot.com",
  messagingSenderId: "243382548439",
  appId: "1:243382548439:web:f1a0129415b3c90bccbd92",
  measurementId: "G-SMH6TVBXK1"

});


// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload) {

  console.log('[firebase-messaging-sw.js] Received background message ', payload);

  // Customize notification here
  const notificationTitle = payload.notification.title;

  const notificationOptions = {
    body: payload.notification.body,
    icon: payload.notification.icon //your logo here
  };

  console.log(payload);
  return self.registration.showNotification(notificationTitle,notificationOptions);

});