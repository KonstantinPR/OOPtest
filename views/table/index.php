<?php include_once(ROOT . '/views/layouts/header.php') ?>


    <body>


<div class="container">

    <h3 class="text-muted">Учет финансов</h3><br>


    <form action="http://new.elenachezelle.ru/pattern/fin/table" role="form" method="post">
        <div class="form-group">
            <input name="date" type="date" class="form-control" id="date"
                   placeholder="<?php echo date("d.m.Y"); ?>">
        </div>
        <div class="form-group">
            <input name="username" type="text" class="form-control" id="username" placeholder="<?php echo $name ?>"
                   value="<?php echo $name ?>">
        </div>
        <div class="form-group">
            <select id="currency" name="currency" class="form-control" onChange="Selected(this)">
                <?php foreach ($currency as $value): ?> //заносим в список для выбора все значения валюты
                    <option value='<?php echo $value['currency']; ?>'><?php echo $value['currency']; ?></option>
                <?php endforeach; ?>
            </select>
            <!--<textarea name="description" type="" class="form-control" id="description" placeholder="Описание"></textarea>-->
            <!-- <input type="textarea" class="form-control" id="description" placeholder="Описание">-->
        </div>
        <div class="form-group">
            <input name="summ" type="text" class="form-control" id="summ" placeholder="Сумма">
        </div>
        <div class="form-group">
            <select id="actSelect" name="description" class="form-control" onChange="Selected(this)">
                <?php foreach ($itemList as $value): ?> //заносим в список все возможные транзакции - статьи расходов
                    <option value='<?php echo $value['value']; ?>'><?php echo $value['value']; ?></option>
                <?php endforeach; ?>
            </select>
            <!--<textarea name="description" type="" class="form-control" id="description" placeholder="Описание"></textarea>-->
            <!-- <input type="textarea" class="form-control" id="description" placeholder="Описание">-->
        </div>
        <div class="form-group">
            <textarea name="fulldescription" type="text" class="form-control" id="summ"
                      placeholder="Комментарий"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Отправить</button>

    </form>


    <br>
    <table class="table table-hover table-bordered table-striped">

        <tr>
            <td width="50" class="success"><a href="http://new.elenachezelle.ru/pattern/fin/sort/id"><span class="glyphicon glyphicon-triangle-bottom"></span> №</a></td>
            <td width="100" class="success"><a href="http://new.elenachezelle.ru/pattern/fin/sort/date"><span class="glyphicon glyphicon-triangle-bottom"></span> Дата</a></td>
            <td class="success"><a href="http://new.elenachezelle.ru/pattern/fin/sort/username"><span class="glyphicon glyphicon-triangle-bottom"></span> Имя</a></td>
            <td width="80"class="success"><a href="http://new.elenachezelle.ru/pattern/fin/sort/summ"><span class="glyphicon glyphicon-triangle-bottom"></span> Сумма</td>
            <td width="90" class="success"><a href="http://new.elenachezelle.ru/pattern/fin/sort/currency"><span class="glyphicon glyphicon-triangle-bottom"></span> Валюта</td>
            <td width="105" class="success"><a href="http://new.elenachezelle.ru/pattern/fin/sort/description"><span class="glyphicon glyphicon-triangle-bottom"></span> Описание</td>
            <td class="success"><a href="http://new.elenachezelle.ru/pattern/fin/sort/fulldescription"><span class="glyphicon glyphicon-triangle-bottom"></span> Комментарий</td>
        </tr>
        <?php $id = 'id'; ?>
        <?php foreach ($tableList as $tableItem): ?>
            <tr>
                <td id="<?php echo $tableItem[$id] ?>"><?php echo " " . $tableItem[$id] ?>
                    <a href="http://new.elenachezelle.ru/pattern/fin/change/<?php echo $tableItem[$id] ?>"><span
                            class="glyphicon glyphicon-refresh"></span></a>
                </td>
                <td><?php echo $tableItem['date'] ?></td>
                <td><?php echo $tableItem['username'] ?></td>
                <td><?php echo $tableItem['summ'] ?></td>
                <td><?php echo $tableItem['currency'] ?></td>
                <td><?php echo $tableItem['description'] ?></td>
                <td><?php echo $tableItem['fulldescription'] ?></td>

            </tr>
        <?php endforeach; ?>


    </table>


    <!--Таблица в футере со сгруппированными по статьям расходами-->
    <br>
    <table class="table table-hover table-bordered table-striped">

        <?php foreach ($summItem as $key => $value): ?>

            <tr>
                <th><b>
                        <form target="_blank" method="post"
                              action="http://new.elenachezelle.ru/pattern/fin/report">
                            <button class="btn-link" type="submit" name="<?php echo $key ?>"
                                    value="Отправить"><?php echo $key ?></button>
                        </form>
                    </b></th>
                <th>
                    <?php echo $value ?>
                </th>
            </tr>

        <?php endforeach ?>

        <!--Итоговые затраты - сумма всех затрат-->

        <tr>
            <th class='success'><b>
                    <form target="_blank" method="post"
                          action="http://new.elenachezelle.ru/pattern/fin/finalReport">
                        <button class="btn-link" type="submit" name="report"
                                value="Отправить">Итоговый отчет:
                        </button>
                    </form>
                </b></th>
            <th class='success'> <?php echo $summAll ?> </th>
        </tr>
        <br>

    </table>
    <br>


<?php include_once(ROOT . '/views/layouts/footer.php') ?>