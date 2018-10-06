<div class="main">
    <div class="content container">
        <div class="row">
            <div class="fame col-md-9 col-md-offset-1">
                <div class="fame_all">
                    <a href="fame_all.php">Все записи по фейму</a>
                </div>  <!-- user add -->
                <hr>
                <!-- FAME MENU ADD -->
                <div class="fame_menu">
                    <form class="form-inline" action="fame_farm.php" method="post">
                        <div class="form-group">
                            <input type="number" name="fame" class="form-control" placeholder="Количество фейма">
                            <button type="submit" name="submit" value="fame_add" class="btn btn-primary">Добавить опыт
                            </button>
                        </div>
                    </form>
                </div>  <!-- FAME MENU ADD -->

                <h3>Фейм фарм</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>id</th>
                        <th>Фейм</th>
                        <th>Время</th>
                        <th>Продол, мин</th>
                        <th>Фейма набито</th>
                        <th>Фейм в час</th>
                        <th>Заход</th>
                        <th>Удалить</th>
                    </tr>
                    {foreach $fames as $fame}
                        <tr>
                            <td>{$fame.order}</td>
                            <td>{$fame.fame}</td>
                            <td>{$fame.fame_time}</td>
                            <td>{$fame.timespent}</td>
                            <td>{$fame.fame_get}</td>
                            <td>{$fame.fame_per_hour}</td>
                            <td>{$fame.round}</td>
                            <td><a href="fame_delete.php?id={$fame.id}">Удал.</a></td>
                        </tr>
                    {/foreach}
                </table>
                {*BUTTON ROUND END*}
                <div class="row">
                    <div class="round_end_button">
                        <form name="round_end" action="fame_farm.php" method="post">
                            <button type="submit" name="submit" value="round_end"
                                    class="btn btn-danger col-md-5 col-md-offset-3">Закрыть заход
                            </button>
                        </form>
                    </div>
                </div>
                {*BUTTON ROUND END*}
                <div class="row">
                    <h3>Фейм за заход</h3>
                    <table class="table table-bordered">
                        <tr>
                            <th>id</th>
                            <th>Дата</th>
                            <th>Заход</th>
                            <th>Всего фейма</th>
                            <th>Фейм за час</th>
                            <th>Времени потрачено, мин</th>
                            <th>Подробнее</th>
                        </tr>
                        {foreach $round_fames as $round_fame}
                            <tr>
                                <td>{$round_fame.id}</td>
                                <td>{$round_fame.date}</td>
                                <td>{$round_fame.round}</td>
                                <td>{$round_fame.fame_per_round}</td>
                                <td>{$round_fame.fame_per_hour}</td>
                                <td>{$round_fame.total_timespent}</td>
                                <td><a href="fame_round_info.php?round={$round_fame.round}">Подробнее</a></td>
                            </tr>
                        {/foreach}
                    </table>
                </div>
            </div> {*fame*}
        </div>{*   row*}
    </div><!-- content container -->
</div><!-- end of main  -->
