<div class="main">
    <div class="content container">
      <div class="row">
        <div class="redaktor col-md-8 col-md-offset-1">
            <a class="btn btn-primary" href="index.php"> Вернуться обратно</a>
         
              <h1>Редактирование статьи</h1>
                  <!-- выводим сообщение об ошибках если есть  -->
               
              <form action="edit.php?id={$article.id}" method="post">
                    <h2 class="a-title"></h2>
                    <input name="article[subject]" type="text" class="form-control" placeholder="Тема поста" value="{$article.subject}">  
                    <div class="a-content">
                        <textarea id="editor" name="article[full_text]" class="form-control" rows="20" cols="80" placeholder="Ваш текст">{$article.full_text}</textarea>             
                        <hr>
                        <p>Видимость</p>
                        <label class="radio-inline">
                        <input type="radio" name="article[visible]" id="inlineRadio1" value="1" {if $article.visible eq 1 } checked {/if}> Видно
                        </label>
                        <label class="radio-inline">
                        <input type="radio" name="article[visible]" id="inlineRadio2" value="0" {if $article.visible eq 0 } checked {/if}> Скрыто
                        </label>
                    </div> <!-- a-content -->
                    <div id="operations">
                    <input class="btn btn-primary" type="submit" value="Отредактировать" />
                    </div>
              </form>

        </div>
        <!-- redaktor -->
      </div>
        <!-- row  -->
    </div>
    <!-- content container -->
</div> 
    <!-- end of main  -->
