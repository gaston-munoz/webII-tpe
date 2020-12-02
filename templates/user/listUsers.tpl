{include file="../layout/header.tpl"}
<div class="container user-body">
    <table class="table table-bordered table-striped mt-4 mb-5">
        <thead class='table-dark'>
            <tr>
            <th scope="col">Nombre</th>
            <th scope="col">E-mail</th>
            <th scope="col">Es Administrador</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$users item=user}
                <tr class="" >
                    <th scope="row">
                        {$user->name|upper} 
                    </th>
                    <td>
                        {$user->email}
                    </td>
                    <td>
                        {($user->isAdmin === '1')? 'SI' : 'NO'}
                    </td>
                    <td>
                    {if $user->isAdmin === '0'}
                          <a class='btn btn-info' href='usuario/administrador/{$user->id}'>Marcar como Administrador</a>
                    {else}
                          <a class='btn btn-info' href='usuario/no-administrador/{$user->id}'>Quitar como Administrador</a> 
                    {/if}
                       <a class='btn btn-danger' href='usuario/eliminar/{$user->id}'>Eliminar</a>
                    </td>  
                </tr>
            {/foreach} 
        </tbody>
    </table>
</div>

{include file="../layout/footer.tpl"}