{include file="../layout/header.tpl"}
<div class="container container-body col-md-10">
    <table class="table table-bordered table-striped mt-4 mb-5">
        <thead class='table-dark'>
            <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Opciones</th>

            </tr>
        </thead>
        <tbody>
            {foreach from=$categories item=category}
                <tr class="" >
                    <th scope="row">
                        {$category->name} 
                    </th>
                    <td>
                        {$category->description}
                    </td>
                    <td>
                        <a class='btn btn-success' href='actividades/categoria/{$category->id}'>Ver Actividades</a>
                    </td>

                </tr>
            {/foreach} 
        </tbody>
    </table>
</div>

{include file="../layout/footer.tpl"}