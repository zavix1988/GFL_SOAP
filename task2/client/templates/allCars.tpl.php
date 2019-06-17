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
                    <th>№</th>
                    <th>Бренд</th>
                    <th>Модель</th>
                </tr>

                </thead>
                <tbody>
                <?php for($i=0; $i<count($allCars); $i++):?>
                    <tr>
                        <td><a href="?id=<?=$allCars[$i]->id?>"><?=$i+1?></a></td>
                        <td><?=$allCars[$i]->brand?></td>
                        <td><?=$allCars[$i]->model?></td>
                    </tr>
                <?php endfor;?>
                </tbody>
            </table>
        </div>
    </div>
</div>