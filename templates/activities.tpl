{include file="header.tpl"}
<div class="container">
    <table class="table table-bordered table-striped mt-4 mb-5">
        <thead class='table-dark'>
            <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Precio</th>
            <th scope="col">Ciudad</th>
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
                        <a class='btn btn-info' href='actividad/{$activity->id}'>Ver Actividad</a>
                    </td>
                </tr>
            {/foreach} 
        </tbody>
    </table>
</div>

{include file="footer.tpl"}