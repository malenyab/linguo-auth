importScripts('https://www.gstatic.com/firebasejs/7.6.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.6.0/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyDP0yN151wuPyPerzxwXAE76syWSbX5vGA",
    authDomain: "linguo-a9dda.firebaseapp.com",
    databaseURL: "https://linguo-a9dda.firebaseio.com",
    projectId: "linguo-a9dda",
    storageBucket: "linguo-a9dda.appspot.com",
    messagingSenderId: "309316586737",
    appId: "1:309316586737:web:50f678e3bfef5015bb6d50",
    measurementId: "G-V7R39GHWLZ"
});

const messaging = firebase.messaging();