{include file="../layout/header.tpl"}
  <div class='container container-body'>
    <div class='col-md-6 mx-auto mt-3 pt-2'>
        <div class='card'>
            <div class='card-header bg-dark text-white text-center'>
                <h3>
                  Edita la actividad
                </h3>   
            </div>
            <div class='card-body'>
            <form action='actividades/actualizar/{$activity->id}' method='POST' enctype="multipart/form-data">
                <div class='form-group'>
                  <input type='text' name='title' value='{$activity->title}' placeholder='Ingrese el titulo' class='form-control' required/>                       
                </div>
                <div class='form-group'>
                    <textarea rows='3' name='description' placeholder='Ingrese la descripcion' class='form-control' required>{$activity->description}</textarea>                       
                </div>
                <div class='form-group'>
                    <label>Ingresa el Precio</label><input type='number' value={$activity->price} name='price' class='form-control' required />                       
                </div>
                <div class='form-group'>
                   <div class="input-group mb-3">
                        <select class="custom-select" name='categoryId' value={$activity->categoryId} id="inputGroupSelect01" required>
                            {foreach from=$categories item=category }
                              {if $activity->categoryId == $category->id}     
                                <option value={$category->id} selected>{$category->name}</option>
                              {else}
                                 <option value={$category->id}>{$category->name}</option>  
                              {/if}   
                            {/foreach}  
                        </select>
                    </div>                       
                </div>

                <div class='form-group text-center'>
                  <span>
                    Imagen actual
                  </span>
                  <img src='{$activity->image}' class="img-thumbnail">
                </div>

                <div class='custom-file mb-3'>
                  <input type='file' name='image' id='image' class="custom-file-input"/> 
                  <label class="custom-file-label " for="validatedCustomFile">Cambia la imagen</label>                      
                </div>

                <div class='form-group'>
                  <button type='submit' class='btn btn-success btn-block' >
                    Editar
                  </button>
                </div>  
            </form>
            </div>
        </div>
    </div>