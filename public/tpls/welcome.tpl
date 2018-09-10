<header class="intro-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Точка входа</h1>
                    <hr class="small">
                    <span class="subheading">Введите ваш email и пароль</span>
                </div>
            </div>
        </div>
    </div>
</header>
{* вывод ошибки *}

<form action="welcome.php" method="post">
    <table class="table">
        <tr class="info">
            <th>Параметр</th>
            <th>Значение</th>
        </tr>
        <tr>
            <td> Почта(логин)</td>
            <td><input id="email" type="email" name="email" value="" required="required"></td>

        </tr>
        <tr>
            <td> Пароль </td>
            <td><input id="password" type="password" name="password" value="" required="required"></td>
        </tr>

    </table>
    <div class="container-fluid">
        <input type="submit" name= "submit" value="Войти" class="btn btn-primary col-lg-2 col-lg-offset-3" >
        <a href="registration.php"><div class="btn btn-danger col-lg-2">Зарегистрироваться</div></a>
    </div>
</form>
