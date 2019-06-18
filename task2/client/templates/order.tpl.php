<div class="container">
    <h1 class="text-center">AutoShop</h1>
    <hr/>
    <div class="row">
        <div class="col-md-12">
            <h4>Заказать машину</h4>
            <form class="form" action="<?=HOME?>" method="post">
                <input type="hidden" name="carId" value="<?=$carId?>">
                <div class="form-group">
                    <label for="firstName">Ваше имя</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Введите имя">
                </div>
                <div class="form-group">
                    <label for="lastName">Ваша фамилия</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Введите фамилию">
                </div>
                <div class="form-group">
                    <label for="payment">Способ оплаты</label>
                    <select name="payment" class="form-control" id="payment">
                        <option value="credit_cart" selected>Карта</option>
                        <option value="cash">Наличка</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-secondary">Заказать</button>
            </form>
        </div>
    </div>
</div>