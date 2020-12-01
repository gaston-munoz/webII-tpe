{if !($smarty.session)}
    <div id="usuario" data-user=""></div>
{else}
    <section id='user' data-user="{$smarty.session.userId}" ></section>
    <section id='isAdmin' data-isAdmin="{$smarty.session.isAdmin}" ></section>
{/if}
<section id='activity' data-activity="{$activity->id}" ></section>

<div class="container p-4">
    <div class="row">
        <div class="col-6">
          <h4 class="pb-3">
            Comentarios
          </h4>
          {include file="../vue/listComments.tpl"} 
        </div>

        <div class="col-6">
        {if $smarty.session and $smarty.session.userId}
          {include file="./formComment.tpl"} 
        {/if}  
        </div>
    </div>
</div>