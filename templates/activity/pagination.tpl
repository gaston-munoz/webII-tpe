<nav class="">
  <ul class="pagination justify-content-center">
    {if $page == 1} 
        <li class="page-item disabled">
    {else}     
        <li class="page-item">
    {/if}    
      <a class="page-link" href="actividades?page={$page - 1}" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Anterior</span>
      </a>
    </li>

    {for $loop=1 to $totalPages}
        {if $page == $loop} 
            <li class="page-item active"><a class="page-link" href="actividades?page={$loop}">{$loop}</a></li>
        {else}     
             <li class="page-item"><a class="page-link" href="actividades?page={$loop}">{$loop}</a></li>
        {/if} 
    {/for}

    {if $page == $totalPages} 
        <li class="page-item disabled">
    {else}     
        <li class="page-item">
    {/if} 
        <a class="page-link" href="actividades?page={$page + 1}" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Siguiente</span>
      </a>
    </li>
  </ul>
</nav>