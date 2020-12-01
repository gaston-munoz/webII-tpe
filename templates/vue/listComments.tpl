{literal}
<div id="root">

    <ul id="task-list" class="list-group">
        <li 
            v-for="comment in comments"
            :data-id-task="comment.id" 
            class="list-group-item"> 
            
            <h6>
              {{ comment.name }}:
            </h6>
            <p>
                &nbsp;&nbsp; {{ comment.comment}} - {{ comment.stars}} Estrellas
            </p>
            <button v-if="isAdmin" v-on:click="deleteComment(comment.id)"  :data-id="comment.id" class="btn btn-danger" id="btn-delete">
            <i class="fas fa-trash-alt"></i></a>
                Borrar
            </button>
         </li>
    </ul>

</div>
{/literal}
