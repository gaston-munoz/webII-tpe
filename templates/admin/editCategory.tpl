{include file="../layout/header.tpl"}
  <div class='container container-body'>
    <div class='col-md-6 mx-auto mt-3 pt-2'>
        <div class='card'>
            <div class='card-header bg-dark text-white text-center'>
                <h3>
                  Edita la Categoria
                </h3>   
            </div>
            <div class='card-body'>
            <form action='categorias/actualizar/{$category->id}' method='POST'>
                <div class='form-group'>
                  <input type='text' name='name' value='{$category->name}' class='form-control' required/>                       
                </div>
                <div class='form-group'>
                    <textarea rows='3' name='description' class='form-control' required>{$category->description}</textarea>                       
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