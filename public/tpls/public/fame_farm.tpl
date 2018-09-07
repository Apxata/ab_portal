<div class="main">
    <div class="content container">
        <div class="row">
           <div class="user col-md-8 col-md-offset-1">
            <!-- USER ADD MENU -->
           <div class="">
            <form active="index.php" method="post">
              <div class="form-group">
                <input type="number" name="fame" class="form-control" placeholder="Количество фейма">
              </div>
              <button type="submit" class="btn btn-primary">Добавить опыт</button>
            </form>
           </div>  <!-- user add -->
          
        <h2>Фейм фарм</h2>
        <table class="table table-bordered">
          <tr>
            <th>id </th>
            <th>Фейм </th>
            <th>Время </th>
            <th>Продолжительность, мин </th>
            <th>Фейм за период </th>
            <th>Фейм в час </th>
          </tr>
    {foreach $fames as $fame} 
      <tr>
      <td>{$fame.id}</td>
      <td>{$fame.fame}</td>
      <td>{$fame.fame_time}</td>
      <td>{$fame.timespent}</td>
      <td>{$fame.fame_get}</td>
      <td>{$fame.fame_per_hour}</td>
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