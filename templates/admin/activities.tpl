{include file="../layout/header.tpl"}
<div class="p-4 container-body p-1">
    <div class='row'>
      <div class='col-md-7 mx-auto'>
            <table class="table table-bordered table-striped mt-4 mb-5">
                <thead class='table-dark'>
                    <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$activities item=activity}
                        <tr class="" >
                            <th scope="row">
                                <a class='link' href='actividad/{$activity->id}'>{$activity->title|upper}</a> 
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
                                <a class='btn btn-info p-1' href='actividades/editar/{$activity->id}'><i class="fas fa-edit fw-u"></i></a>
                                <a class='btn btn-danger p-1 ' href='actividades/eliminar/{$activity->id}'><i class="far fa-trash-alt fw-u"></i></a>
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
                Cree una nueva actividad actividad
                </h3>   
            </div>
            <div class='card-body'>
            <form action='nuevaActividad' method='POST' enctype="multipart/form-data">
                <div class='form-group'>
                  <input type='text' name='title' placeholder='Ingrese el titulo' class='form-control' required/>                       
                </div>
                <div class='form-group'>
                    <textarea rows='3' name='description' placeholder='Ingrese la descripcion' class='form-control' required></textarea>                       
                </div>
                <div class='form-group'>
                    <label>Ingresa el Precio</label><input type='number' name='price' class='form-control' required />                       
                </div>
                <div class='form-group'>
                   <div class="input-group mb-3">
                        <select class="custom-select" name='categoryId' id="inputGroupSelect01" required>
                            <option >Elige una categoria</option>
                            {foreach from=$categories item=category }   
                                <option value={$category->id}>{$category->name}</option>
                            {/foreach}  
                        </select>
                    </div>                       
                </div>
                <div class='custom-file mb-3'>
                  <input type='file' name='image' id='image' class="custom-file-input"/> 
                  <label class="custom-file-label " for="validatedCustomFile">Suba una imagen</label>                      
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