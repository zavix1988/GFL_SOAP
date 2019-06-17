<div class="container">
    <h1 class="text-center">Книги</h1>
    <hr/>
    <div class="row">
        <div class="col-md-2">
            <h4>Фильтр</h4>
            <form class="form" action="/filter" method="get">
                <div class="form-group">
                    <label for="author">Автор</label>
                    <select name="author" class="form-control" id="lang">
                        <option value="0" selected>Автор</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="genre">Жанр</label>
                    <select name="genre" class="form-control" id="lang">
                        <option value="0" selected>Жанр</option>

                    </select>
                </div>
                <button type="submit" class="btn btn-secondary">Посмотреть</button>
            </form>
        </div>
        <div class="col-md-10">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Бренд</th>
                    <th>Модель</th>
                    <th>Год выпуска</th>
                    <th>Объём двигуна(Л)</th>
                    <th>Макс. скорость</th>
                    <th>Цена</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$car->brand?></td>
                        <td><?=$car->model?></td>
                        <td><?=$car->year?></td>
                        <td><?=$car->displacement?></td>
                        <td><?=$car->color?></td>
                        <td><?=$car->max_speed?></td>
                        <td><?=$car->price?></td>
                        <a class="btn btn-primary" href="?car=<?=$car->id?>" role="button">Купить</a>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>