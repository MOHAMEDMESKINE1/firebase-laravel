// const { initializeApp } = require("firebase/app")
// const { getAuth } = require("firebase/auth")

import { initializeApp } from "firebase/app";
import { getAuth } from "firebase/auth";

const firebaseConfig = {
    apiKey: "AIzaSyBL8o_duEIpzvPtLBmRMYJtd8TjIC4GOGs",
    authDomain: "messaging-66768.firebaseapp.com",
    projectId: "messaging-66768",
    storageBucket: "messaging-66768.firebasestorage.app",
    messagingSenderId: "455185239914",
    appId: "1:455185239914:web:8f1b9e7dca8145e6759f13",
    measurementId: "G-NMVV31TXYV"
  };
// Initialize Firebase

// const firebaseConfig = {
//     apiKey: "AIzaSyDuzIqE7Ag43kDLUYfR03WxzSAQwBxTxYM",
//     authDomain: "ftblr-app-8cca6.firebaseapp.com",
//     projectId: "ftblr-app-8cca6",
//     storageBucket: "ftblr-app-8cca6.firebasestorage.app",
//     messagingSenderId: "688576131973",
//     appId: "1:688576131973:web:16088ff6e173726a5bcaec",
//     measurementId: "G-NJTNMMLLG1"
// };
const app = initializeApp(firebaseConfig);
const auth = getAuth(app)

export default auth;