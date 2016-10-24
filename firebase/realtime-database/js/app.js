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


    //get element
    const preObject = document.getElementById('object');

    const ulList = document.getElementById('list');

    //create references
    const dbRefObject = firebase.database().ref().child('object');

    const dbRefList = dbRefObject.child('hobbies');


    //sync object changes
    dbRefObject.on('value', snap => console.log(snap.val())
    );

    dbRefObject.on('value', snap => {
        preObject.innerText = JSON.stringify(snap.val(), null, 3);
});

    //sync list changes
    dbRefList.on('child_added', snap => {

        const li = document.createElement('li');
    li.innerText = snap.val();
    li.id = snap.key;
    ulList.appendChild(li);
});

    dbRefList.on('child_changed', snap=> {
       const liChanged = document.getElementById(snap.key);
    liChanged.innerText = snap.val();
    });

    dbRefList.on('child_removed', snap=> {
        const liRemove = document.getElementById(snap.key);
    liRemove.remove();
});


}());