<div class="main">
    <div class="content container">
        <div class="row">
            <div class="fame col-md-9 col-md-offset-1">

                <div class="row">
                    <a href="fame_farm.php">
                        <button class="btn btn-primary col-sm-3"> Вернуться назад</button>
                    </a>
                </div>
                <h3>Фейм за {$fames[0].round} круг </h3>
                <table class="table table-bordered">
                    <tr>
                        <th>id</th>
                        <th>Фейм</th>
                        <th>Время</th>
                        <th>Продол, мин</th>
                        <th>Фейма набито</th>
                        <th>Фейм в час</th>
                        <th>Заход</th>
                    </tr>
                    {foreach $fames as $fame}
                        <tr>
                            <td>{$fame.id}</td>
                            <td>{$fame.fame}</td>
                            <td>{$fame.fame_time}</td>
                            <td>{$fame.timespent}</td>
                            <td>{$fame.fame_get}</td>
                            <td>{$fame.fame_per_hour}</td>
                            <td>{$fame.round}</td>
                        </tr>
                    {/foreach}
                </table>
            </div> {*fame*}
        </div>{*   row*}
    </div><!-- content container -->
</div><!-- end of main  -->