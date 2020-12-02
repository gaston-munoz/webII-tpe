{include file="../layout/header.tpl"}
<div class="container container-body">
    <button class="btn btn-info font-weight-bold" id="btn-filter">Filtrar</button>
    {include file="./filter.tpl"}
    <table class="table table-bordered table-striped mt-4 mb-5">
        <thead class='table-dark'>
            <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Precio</th>
            <th scope="col">Categoria</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$activities item=activity}
                <tr class="" >
                    <th scope="row">
                        {$activity->title|upper} 
                    </th>
                    <td>
                        {$activity->description}
                    </td>
                    <td>
                        {$activity->price}
                    </td>
                    <td>
                        {$activity->name}
                    </td>
                    <td>
                        <a class='btn btn-info' href='actividad/{$activity->id}'>Ver Actividad</a>
                    </td>
                </tr>
            {/foreach} 
        </tbody>
    </table>
</div>
{include file="./pagination.tpl"}
<script src="js/filter.js"></script>
{include file="../layout/footer.tpl"}