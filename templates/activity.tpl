{include file="header.tpl"}
    <div class='container mb-5'>
      <div class="jumbotron pt-0 pl-0 pr-0 mb-5">
        <img width='100%' src='{$activity->image}' alt='THE BEST'>
        <div class='container'>
             <h2 class="display-4 mt-3 mb-3 pl-3 pr-2">{$activity->description}</h2>
            <hr class="my-4">
            <div class='d-flex justify-content-center align-items-center mt-5'> 
                <h3 class='mr-3'>Oferta del dia a solo ${$activity->price}</h3>
                <a class="btn btn-primary btn-lg ml-3" href="#" role="button">Comprar</a>
            </div>
        </div>
      </div>
    </div>
{include file="footer.tpl"}