import firebase from 'firebase'
import firestore from 'firebase/firestore'

// Initialize Firebase
var config = {
	apiKey: "AIzaSyAEyH1_8hNzjCXFRET4Qs9aOnjfF-qAa9o",
	authDomain: "vue-chat-b3fb1.firebaseapp.com",
	databaseURL: "https://vue-chat-b3fb1.firebaseio.com",
	projectId: "vue-chat-b3fb1",
	storageBucket: "vue-chat-b3fb1.appspot.com",
	messagingSenderId: "454916267593"
};

const firebaseApp = firebase.initializeApp(config)
firebaseApp.firestore().settings({ timestampsInSnapshots : true })

export default firebaseApp.firestore()