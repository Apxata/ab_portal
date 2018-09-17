<div class="main">
    <div class="content container">
      <div class="row">
        <div class="article-list col-md-8 col-md-offset-1">
            <div class="add_article">
                <a href="new_article.php">Добавить статью</a>
            </div>
           {foreach $articles as $article}
           
            <div class="article">
            
                    <h2 class="a-title">{$article['subject']}</h2>
                    <div class="a-info">{$article['create_date']}</div>
                    <div class="a-content">{$article['full_text']}                    
                    </div>   <!-- a-content -->
                    <div class="a-footer">
                    <div class="comments"> 0 комментариев </div>
                    <div class="editing col-sm-offset-6"><a href="edit.php?id={$article['id']}">Редактировать</a></div>
                    <div class="visible"> Статья показывается:</div>
                     </div> <!-- a-footer -->
               
            </div>
            <!-- article -->
         {/foreach}
         </div>
        <!-- article-list -->
      
      </div>
        <!-- row  -->
    </div>
    <!-- content container -->
</div> 
    <!-- end of main  -->
  
   
    