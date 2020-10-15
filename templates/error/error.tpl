{include file="../layout/header.tpl"}
<div class="container container-body">
    <div class="col-md-8 mx-auto">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading text-center"><i class="fas fa-bug"></i></h4>
            <h4>{$message}</h4>
            <hr>
            <div class='text-center' >
                <a class='btn btn-info btn-block font-weight-bold mx-auto' href='volver'>
                  Volver
                </a>
            </div>
        </div>
    </div>
</div>

{include file="../layout/footer.tpl"}