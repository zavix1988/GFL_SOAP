<div class="container">
    <h1 class="text-center">Cars</h1>
    <hr/>
    <div class="row">
        <div class="col-md-2">
            <h4>Фильтр</h4>
            <form class="form" action="<?=HOME?>" method="POST">
                <div class="form-group">
                    <label for="year">Год выпуска</label>
                    <input type="text" class="form-control" id="year" name="year" placeholder="Год выпуска" required>
                </div>
                <div class="form-group">
                    <label for="brand">Бренд</label>
                    <input type="text" class="form-control" id="brand" name="brand" placeholder="Бренд">
                </div>
                <div class="form-group">
                    <label for="model">Модель</label>
                    <input type="text" class="form-control" id="model" name="model" placeholder="Модель">
                </div>
                <div class="form-group">
                    <label for="color">Цвет</label>
                    <input type="text" class="form-control" id="color" name="color" placeholder="Цвет">
                </div>
                <div class="form-group">
                    <label for="max_speed">Максимальная скорость</label>
                    <input type="text" class="form-control" id="max_speed" name="max_speed" placeholder="Максимальная скорость">
                </div>
                <div class="form-group">
                    <label for="min_displacement">Объем двигуна от</label>
                    <input type="text" class="form-control" id="min_displacement" name="min_displacement" placeholder="Объем двигуна от">
                </div>
                <div class="form-group">
                    <label for="max_displacement">Объем двигуна до</label>
                    <input type="text" class="form-control" id="max_displacement" name="max_displacement" placeholder="Объем двигуна до">
                </div>
                <div class="form-group">
                    <label for="min_price">Стоимость от</label>
                    <input type="text" class="form-control" id="min_price" name="min_price" placeholder="Стоимость от">
                </div>
                <div class="form-group">
                    <label for="max_price">Стоимость до</label>
                    <input type="text" class="form-control" id="max_price" name="max_price" placeholder="Стоимость до">
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
                <?php if(!empty($allCars)):?>
                    <?php for($i=0; $i<count($allCars); $i++):?>
                        <tr>
                            <td><a href="?id=<?=$allCars[$i]->id?>"><?=$i+1?></a></td>
                            <td><?=$allCars[$i]->brand?></td>
                            <td><?=$allCars[$i]->model?></td>
                        </tr>
                    <?php endfor;?>
                <?php else:?>
                    <tr>
                        <td colspan="3">Пусто</td>
                    </tr>
                <?php endif;?>

                </tbody>
            </table>
        </div>
    </div>
</div>