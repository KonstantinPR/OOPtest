<?php include_once(ROOT . '/views/layouts/header.php') ?>

    <body>


<div class="container">

    <h3 class="text-muted">Изменить транзакцию</h3><br>


    <form action="http://new.elenachezelle.ru/pattern/fin/changetransaction/<?php echo $tableList['id'] ?>" role="form" method="post">
        <div class="form-group">
            <input name="date" type="date" class="form-control" id="date"
                   value="<?php echo $tableList['date'] ?>" placeholder="<?php echo date("d.m.Y"); ?>">
        </div>
        <div class="form-group">
            <input name="username" type="text" class="form-control" id="username" placeholder="<?php echo $name ?>"
                   value="<?php echo $name ?>">
        </div>
        <div class="form-group">
            <select id="currency" name="currency" class="form-control" onChange="Selected(this)">
                <option value='<?php echo $tableList['currency'] ?>'><?php echo $tableList['currency'] ?></option>
                <?php foreach ($currency as $value): ?> //заносим в список для выбора все значения валюты
                    <option value='<?php echo $value['currency'] ?>'><?php echo $value['currency']; ?></option>
                <?php endforeach; ?>
            </select>
            <!--<textarea name="description" type="" class="form-control" id="description" placeholder="Описание"></textarea>-->
            <!-- <input type="textarea" class="form-control" id="description" placeholder="Описание">-->
        </div>
        <div class="form-group">
            <input name="summ" type="text" class="form-control" id="summ" placeholder="Сумма"
                   value="<?php echo $tableList['summ'] ?>">
        </div>
        <div class="form-group">
            <select id="actSelect" name="description" class="form-control" onChange="Selected(this)">
                <option value='<?php echo $tableList['description'] ?>'><?php echo $tableList['description'] ?></option>
                //заносим в список все возможные транзакции - статьи расходов
                <?php foreach ($itemList as $value): ?>
                    //Если транзакция уже была не выводим ее
                    <?php if ($value['value'] == $tableList['description']): ?>
                        <?php next($itemList); ?>
                    <?php else : ?>
                        <option value='<?php echo $value['value'] ?>'><?php echo $value['value'] ?></option>
                    <?php endif ?>
                <?php endforeach; ?>
            </select>
            <!--<textarea name="description" type="" class="form-control" id="description" placeholder="Описание"></textarea>-->
            <!-- <input type="textarea" class="form-control" id="description" placeholder="Описание">-->
        </div>
        <div class="form-group">
            <textarea name="fulldescription" type="text" class="form-control" id="summ"
                      placeholder="Комментарий"><?php echo $tableList['fulldescription'] ?></textarea>
        </div>

        <button type="submit" class="btn btn-info">Изменить</button>

    </form>


    <br>
    <table class="table table-hover table-bordered table-striped">

        <tr>
            <td class="success">№</td>
            <td width="100" class="success">Дата</td>
            <td class="success">Имя</td>
            <td class="success">Сумма</td>
            <td class="success">Валюта</td>
            <td class="success">Описание</td>
            <td class="success">Комментарий</td>
        </tr>
        <?php $id = 'id'; ?>

        <tr>
            <td id="<?php echo $tableList[$id] ?>"><?php echo " " . $tableList[$id] ?>
                <a href="http://new.elenachezelle.ru/pattern/fin/change/<?php echo $tableList[$id] ?>"><span
                        class="glyphicon glyphicon-refresh"></span></a>
            </td>
            <td><?php echo $tableList['date'] ?></td>
            <td><?php echo $tableList['username'] ?></td>
            <td><?php echo $tableList['summ'] ?></td>
            <td><?php echo $tableList['currency'] ?></td>
            <td><?php echo $tableList['description'] ?></td>
            <td><?php echo $tableList['fulldescription'] ?></td>

        </tr>


    </table>





<?php include_once(ROOT . '/views/layouts/footer.php') ?>