importScripts('https://www.gstatic.com/firebasejs/10.13.2/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/10.13.2/firebase-messaging-compat.js');

firebase.initializeApp({
    apiKey: "AIzaSyDjLQAVueWxrLttrnpwpd-AIkMj6kppHJ0",
    authDomain: "crypto-web-b16ba.firebaseapp.com",
    projectId: "crypto-web-b16ba",
    storageBucket: "crypto-web-b16ba.firebasestorage.app",
    messagingSenderId: "881439788800",
    appId: "1:881439788800:web:2d13d8dee6b829939f2de5"
});

const messaging = firebase.messaging();
