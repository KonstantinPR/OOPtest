<?php include_once(ROOT . '/views/layouts/header.php') ?>
    <div class="container">
        <h3 class="text-muted"><?php echo $itemValue; ?></h3><br>
        <br>
        <table class="table table-hover table-bordered table-striped">

            <tr>
                <td class="success">№</td>
                <td class="success">Дата</td>
                <td class="success">Имя</td>
                <td class="success">Сумма</td>
                <td class="success">Валюта</td>
                <td class="success">Описание</td>
                <td class="success">Комментарий</td>
            </tr>

            <?php foreach ($fetchResult as $tableItem): ?>
                <tr>
                    <td><?php echo $tableItem['id'] ?></td>
                    <td><?php echo $tableItem['date'] ?></td>
                    <td><?php echo $tableItem['username'] ?></td>
                    <td><?php echo $tableItem['summ'] ?></td>
                    <td><?php echo $tableItem['currency'] ?></td>
                    <td><?php echo $tableItem['description'] ?></td>
                    <td><?php echo $tableItem['fulldescription'] ?></td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>

<?php include_once(ROOT . '/views/layouts/footer.php') ?>