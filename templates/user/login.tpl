{include file="../layout/header.tpl"}
    <div class='container container-body mt-5 mb-5'>
        <div class='col-md-6 mx-auto'>
            {if isset($message)}
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> {$message} </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            {/if}
            <div class='card'>
              <div class='card-header bg-dark text-white text-center'>
                 <h3>
                    Ingrese los datos de su cuenta
                 </h3>   
              </div>
              <div class='card-body'>
                <form action='login' method='POST'>
                    <div class='form-group'>
                        <input type='email' name='email' placeholder='Ingrese su email' class='form-control'/>                       
                    </div>
                    <div class='form-group'>
                        <input type='password' name='password' placeholder='Ingrese su password' class='form-control' />                       
                    </div>
                    <div class='form-group'>
                      <button class='btn btn-success btn-block' >
                        LOGIN
                      </button>
                    </div>  
                </form>
              </div>
            </div>
        </div>
    </div>
{include file="../layout/footer.tpl"}