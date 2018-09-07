<div class="main">
    <div class="content container">
        <div class="row">
           <div class="user col-md-8 col-md-offset-1">
            <!-- USER ADD MENU -->
           <div class="add_user">
            <a href="new_user.php">Добавить пользователя</a>
           </div>  <!-- user add -->
          
        <h2>Список пользователей</h2>
        <table class="table table-bordered">
          <tr>
            <th>id</th>
            <th>Логин(почта)</th>
            <th>Дата регистрации</th>
            <th>Имя </th>
            <th>Фамилия</th>
            <th>Удален</th>
            <th>Редактировать</th>
          </tr>
  {foreach $users as $user} 
          <tr>
            <td>{$user.id}</td>
            <td>{$user.email}</td>
            <td>{$user.reg_date}</td>
            <td>{$user.first_name}</td>
            <td>{$user.last_name}</td>
            <td>{$user.deleted}</td>
            <td><a href="edit_user.php?id={$user.id}">Ред</a></td>
          </tr>
   {/foreach}
        </table>
           </div>
            <!-- article -->
      </div>
        <!-- row  -->
    </div>
    <!-- content container -->
</div> 
    <!-- end of main  -->