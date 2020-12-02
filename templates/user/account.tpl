{include file="../layout/header.tpl"}

<div class="container container-body">
  <div class='col-md-8 mx-auto'>   
    <div class="card mx-auto text-center">
        <div class='card-header'>
            <h3>
                Dashboard
            </h3>
        </div>
        <div class='card-body mt-3 mb-4'>
            {if $isAdmin}
                <h4>
                    Comience a trabajar!
                </h4>
                <div class='mt-5'>
                    <a class='btn btn-info' href='admin/actividades'>Administar actividades</a> 
                    <a class='btn btn-info' href='admin/categorias'>Administar categorias</a> 
                <div>
            {else}
                <h4>
                    Comience a valorar y comentar nuestras actividades!
                </h4>
                <div class='mt-5'>
                    <a class='btn btn-info' href='actividades'>Ir a ver las actividades</a> 
                <div>
            {/if} 
        </div>
    </div>
  </div>  
</div>

