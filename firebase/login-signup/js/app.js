/**
 * Created by kim on 2016-10-18.
 */
(function () {

    //initialize firebase

    const config = {
        apiKey: "AIzaSyBEPoJJa12RRHKjQbl1H8Qbmjd89ARHLIk",
        authDomain: "link2list-c7a0e.firebaseapp.com",
        databaseURL: "https://link2list-c7a0e.firebaseio.com",
        storageBucket: "",
        messagingSenderId: "904350192959"
    };
    firebase.initializeApp(config);


    //get elements
    const txtEmail = document.getElementById('txtEmail');
    const txtPassword = document.getElementById('txtPassword');
    const btnLogin = document.getElementById('btnLogin');
    const btnSignUp = document.getElementById('btnSignUp');
    const btnLogout = document.getElementById('btnLogout');

    //add login event

    btnLogin.addEventListener('click', e => {
       //get email and pass
        const email = txtEmail.value;
        const pass = txtPassword.value;
        const auth = firebase.auth();
        //Sign In
        const promise = auth.signInWithEmailAndPassword(email, pass);
        promise.catch(e => console(e.message));
    });

    //add signup event
    btnSignUp.addEventListener('click', e => {
        //get email and pass
        //TODO check 4 real email
        const email = txtEmail.value;
    const pass = txtPassword.value;
    const auth = firebase.auth();
    //Sign In
    const promise = auth.createUserWithEmailAndPassword(email, pass);
    promise.catch(e => console(e.message));
    });


    btnLogout.addEventListener('click', e => {
       firebase.auth().signOut();
    });


    //Add a realtime listner
    firebase.auth().onAuthStateChanged(firebaseUser => {
       if(firebaseUser) {
           console.log(firebaseUser);
           btnLogout.classList.remove('hide');
       } else {
            console.log('not in logged in');
            btnLogout.classList.add('hide');
        }
    });


}());