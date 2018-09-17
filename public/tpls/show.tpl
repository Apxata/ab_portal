<div class="main">
    <div class="content container">
      <div class="row">
        <div class="article-list col-md-8 col-md-offset-1 ">
            <div class="article ">
                    <h2 class="a-title">{$article['subject']}</h2>
                    <div class="a-info">{$article['create_date']}</div>
                    <div class="a-content">{$article['full_text']}</div><!-- a-content -->
                    <div class="a-footer"></div>
            </div>  <!-- article -->
            {if isset($session)}
                <h3>Введите ваш комментарий</h3>
                <form action="show.php?article_id={$article_id}" method="post">
                <textarea name=comment class="form-control" rows="1"></textarea>
                <button type="submit" class="btn btn-danger">Отправить</button>
                </form>
            {else}
                <a href="welcome.php">Войдите, если хотите оставить коммент</a>
                <hr>
            {/if}

            <!-- вывод комментов  -->
            {foreach $comments as $comment} 
            <div class="panel panel-primary">
            <div class="panel-heading">  {$comment['nickname']} : {$comment['date_create']} </div>
            <div class="panel-body"> {$comment['comment']}</div>
            </div>
            {/foreach}
            </div><!-- comments    -->
          
         </div>
        <!-- article-list -->
      </div>
        <!-- row  -->
    </div>
    <!-- content container -->
</div> 
    <!-- end of main  -->