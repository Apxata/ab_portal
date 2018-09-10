<div class="main">
    <div class="content container">
      <div class="row">
        <div class="redaktor col-md-8 col-md-offset-1">
            <h2>Добавление нового пользователя </h2>
            <!-- выводим сообщение об ошибках если есть  -->
           
            <form class="form-horizontal" action="edit_user.php?id={$user.id}" method="post">
                <h2 class="a-title"></h2>
    
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Почта(логин)</label>
                    <div class="col-sm-10">
                    <input type="email" name="user[email]" class="form-control" id="inputEmail3" placeholder="Почта(логин)" value="{$user.email}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword1" class="col-sm-2 control-label">Пароль</label>
                    <div class="col-sm-10">
                    <input type="password" name="user[password]" class="form-control" id="inputPassword1" placeholder="пароль">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword2" class="col-sm-2 control-label">Повторите пароль</label>
                    <div class="col-sm-10">
                    <input type="password" name="user[confirm_password]" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inlineRadio1 inlineRadio2" class="col-sm-2 control-label">Удален</label>
                    <div class="col-sm-10">
                        <input type="radio" name="user[deleted]" id="inlineRadio1" value="1" {if $user.deleted eq 1 } checked {/if}> Да
                        <input type="radio" name="user[deleted]" id="inlineRadio2" value="0" {if $user.deleted eq 0 } checked {/if}> Нет
                    </div>
                </div>
                <div id="operations">
                    <div class="col-sm-offset-2 col-sm-10">
                    <input class="btn btn-block btn-lg" type="submit" value="Зарегать" />
                    </div>    <!-- col-sm-offset-2 col-sm-10 -->
             
                </div>
                <!-- operations -->
            </form>   
           
        </div>
        <!-- redaktor -->
      </div>
        <!-- row  -->
    </div>
    <!-- content container -->
</div> 
    <!-- end of main  -->