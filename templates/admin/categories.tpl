{include file="../layout/header.tpl"}
<div class="pl-4 pr-4 container-body p-1">
    <div class='row'>
      <div class='col-md-7 mx-auto'>
            <table class="table table-bordered table-striped mt-4 mb-5">
                <thead class='table-dark'>
                    <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$categories item=category}
                        <tr class="" >
                            <th scope="row">
                                {$category->name|upper} 
                            </th>
                            <td>
                                {$category->description}
                            </td>
                            <td>
                                <a class='btn btn-info p-1' href='categorias/editar/{$category->id}'><i class="fas fa-edit fw-u"></i></a>
                                <a class='btn btn-danger p-1 ' href='categorias/eliminar/{$category->id}'><i class="far fa-trash-alt fw-u"></i></a>
                            </td>
                        </tr>
                    {/foreach} 
                </tbody>
            </table>
      </div>
      <div class='col-md-5 mx-auto mt-3 pt-2'>
        <div class='card'>
            <div class='card-header bg-dark text-white text-center'>
                <h3>
                Cree una nueva actividad Categoria
                </h3>   
            </div>
            <div class='card-body'>
            <form action='nuevaCategoria' method='POST'>
                <div class='form-group'>
                  <input type='text' name='name' placeholder='Ingrese el Nombre' class='form-control' required/>                       
                </div>
                <div class='form-group'>
                    <textarea rows='3' name='description' placeholder='Ingrese la descripcion' class='form-control' required></textarea>                       
                </div>
                <div class='form-group'>
                    <button class='btn btn-success btn-block' >
                      Guardar
                    </button>
                </div>  
            </form>
            </div>
        </div>
      </div>
    </div>
</div>

{include file="../layout/footer.tpl"}