<?php include_once(ROOT . '/views/layouts/header.php') ?>


<div class="container">
<br><br>
    <div class="row">
        <div class="col-xs-2 col-md-3"></div>
        <div class="col-xs-8 col-md-6 collapse in" id="toggleSample2">
            <form name="htmlpattern" method="post" class="form-horizontal" action="http://new.elenachezelle.ru/pattern/fin/auth">
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" placeholder="Email" type="text" name="email" value="<?php /*echo $login; */?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" placeholder="Пароль" type="text" name="password" value="<?php /*echo $password; */?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <input class="btn btn-info" placeholder="Сохранить" type="submit" name="save" value="Войти">
                    </div>
                    <div align="right" class="col-xs-9 col-sm-9 col-md-9">
                        <label class="checkbox">
                            <input type="checkbox" name="rememberme" value="">
                            Запомнить меня
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br><br>


    <br><br>
    <div class="row">
        <div class="col-xs-2 col-md-3"></div>
        <div class="col-xs-8 col-md-6 collapse in" id="toggleSample2">
            <form name="htmlpattern" method="post" class="form-horizontal" action="http://new.elenachezelle.ru/pattern/fin/auth">
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" placeholder="Email" type="text" name="loginreg" value="<?php /*echo $login; */?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" placeholder="Пароль" type="text" name="passwordreg" value="<?php /*echo $password; */?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <input class="btn btn-info" placeholder="Сохранить" type="submit" name="savereg" value="Зарегистрироваться">
                    </div>
                    <div align="right" class="col-xs-9 col-sm-9 col-md-9">
                        <label class="checkbox">
                            <input type="checkbox" name="remembermereg" value="">
                            Запомнить меня
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br><br>



    <!--   <div class="footer">
           <p>&copy; KonstantinPR 2016</p>
       </div>-->

</div> <!-- /container -->

<!-- Bootstrap core JavaScript
================================================== -->

<?php include_once(ROOT . '/views/layouts/footer.php') ?>

