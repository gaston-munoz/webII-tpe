"use strict"

let app = new Vue({
    el: '#root',
    data: {
        comments: [],
        userId: '',
        isAdmin : false,
        activity: ''  
    },
    methods: {
        deleteComment: function (commentId) {
          fetch(`api/comentarios/${commentId}`, {
              method: 'DELETE',
           })
           .then(() => {
              getComments();
           })
           .catch(error => console.log(error));
         }
      } 
});

document.addEventListener('DOMContentLoaded', getData);

async function getData() {
    const user = document.querySelector('#user')?.dataset.user;
    const isAdmin = document.querySelector('#isAdmin')?.dataset.isadmin;
    const activity = document.querySelector('#activity').dataset.activity; 

    app.isAdmin = isAdmin ? true : false;
    app.userId = user ? user : '';
    app.activity = activity ? activity : '';

    if(app.userId){
        document.querySelector('#btn-create-comment').addEventListener('click', event => {createComment(event)});
    }

    getComments();
}

async function getComments() {
    try {
        let comments = [];    
        const response = await fetch(`api/comentarios/${app.activity}`);
        if(response.ok)  {
            comments = await response.json();
            app.comments = comments;
        }   
    } catch (error) {
        console.log(error)
    }
}


function createComment(event) {
    event.preventDefault();
    const text = document.querySelector('#comment');
    const stars = document.querySelector('#stars');
    if(text.value === '' || stars.value === '')
       return;
       
    const comment = {
        activityId: app.activity,
        userId: app.userId,
        comment: text.value,
        stars: stars.value

    }

    fetch('api/comentarios', {
        method: 'POST',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(comment)
    })
      .then(() => {
          getComments();
          text.value = '';
          stars.value = '';
        })
      .catch(error => console.log(error));
}
