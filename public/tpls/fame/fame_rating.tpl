<div class="main">
    <div class="content container">
        <div class="row">
            <div class="fame col-md-9 col-md-offset-1">

                <h3>Фейм рейтинг</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>№</th>
                        <th>Ник</th>
                        <th>Дата</th>
                        <th>Продол, мин</th>
                        <th>Фейма набито</th>
                        <th>Фейм в час</th>
                        <th>Заход</th>
                    </tr>
                    {foreach $fames as $fame}
                        <tr>
                            <td></td>
                            <td>{$fame.nickname}</td>
                            <td>{$fame.date}</td>
                            <td>{$fame.total_timespent}</td>
                            <td>{$fame.fame_per_round}</td>
                            <td>{$fame.fame_per_hour}</td>
                            <td>{$fame.round}</td>
                        </tr>
                    {/foreach}
                </table>
            </div> {*fame*}
        </div>{*   row*}
    </div><!-- content container -->
</div><!-- end of main  -->