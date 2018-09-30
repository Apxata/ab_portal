<div class="main">
    <div class="content container">
        <div class="redaktor col-md-8 col-md-offset-1">
            <h1>Редактирование статьи</h1>
            <!-- выводим сообщение об ошибках если есть  -->
            <div class="row">
                <form class="form-inline" action="edit.php?id={$article.id}" method="post">
                    <a class="btn btn-primary" href="index.php"> Вернуться обратно</a>
                    {*Форма доступа к статье*}
                    <select name="access_via_link" class="form-control col-sm-offset-4">
                        <option value="1" {if $article.access_via_id eq 1 } selected {/if}>Стандартный доступ</option>
                        <option value="2" {if $article.access_via_id eq 2 } selected {/if}>Доступ по ссылке</option>
                    </select>
                    <button type="submit" class="btn btn-danger" name="submit" value="access_type">
                    Изм. доступ</button>
                </form>
                <div class="full-link">
                    {if $article.access_via_id eq 2 } http://albion.test/show.php?article_hash={$article.article_hash} {/if}
                </div>
            </div>
            <div class="row">
                <form action="edit.php?id={$article.id}" method="post">
                    <h2 class="a-title"></h2>
                    <input name="article[subject]" type="text" class="form-control" placeholder="Тема поста"
                           value="{$article.subject|escape}">
                    <div class="a-content">
                        <textarea id="editor" name="article[full_text]" class="form-control" rows="20" cols="80"
                                  placeholder="Ваш текст">{$article.full_text|escape}</textarea>
                        <hr>
                        <p>Видимость</p>
                        <label class="radio-inline">
                            <input type="radio" name="article[visible]" id="inlineRadio1"
                                   value="1" {if $article.visible eq 1 } checked {/if}> Видно
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="article[visible]" id="inlineRadio2"
                                   value="0" {if $article.visible eq 0 } checked {/if}> Скрыто
                        </label>
                        <hr>
                    </div> <!-- a-content -->
                    <div id="operations">
                        <button class="btn btn-primary" name="submit" type="submit" value="update_form">Отредактировать
                        </button>
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
