            <div class="">
                <img id="ae" class="img-fluid w-100" src="/public/src/main_pan.jpg?1">
            </div>

            <? if(!$_SESSION['admin']): ?>
            <div class="mdb-color lighten-2">
                <div id="af" class="row m-0 af h-0">
                    <form class="form-inline mx-auto" action="/auth" method="post">

                        <div class="form-group mb-0 mr-3">
                            <label for="inputPassword" class="sr-only">Введите пин:</label>
                            <input type="password" class="form-control form-control-sm" id="inputPassword" name="pass" placeholder="Введите пин" required>
                        </div>
                        <button id="af-submit" type="submit" class="btn btn-outline-light btn-sm">Войти</button>
                    </form>
                </div>
            </div>
            <? endif; ?>

            <div class="container p-0 mt-4">

                <div class="company-info jumbotron mdb-color lighten-2 text-white mx-3 mx-sm-0 pb-1"> <!-- mx-sm-4 -->

                    <h6 class="text-center mb-4">УПРАВЛЯЮЩАЯ КОМПАНИЯ ООО "ЗОЛОТОЙ КЛЮЧ"</h6>

                    <!--div class="row">
                        <div class="col-sm-3 col-md-2">Адрес:</div>
                        <div class="col-sm-9 col-md-10">675000 Амурская область, г.Благовещенск, ул.Калинина, д.52</div>
                    </div-->

                    <div class="row">

                        <div class="col-sm-4 mb-4">
                            <div class="card text-center">
                                <h6 class="card-header bg-success text-white">Домов в управлении, ед.</h6> <!-- card title -->
                                <div class="card-body bg-white">         
                                    <h2 class="card-text text-success"><?= $data['info']['houses'] ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-4">
                            <div class="card text-center">
                                <h6 class="card-header bg-primary text-white" style="word-break: keep-all">Обслуживаемая площадь, м&#178;</h6> <!-- card title -->
                                <div class="card-body">         
                                    <h2 class="card-text text-primary text-nowrap"><?= $data['info']['area'] ?></h2>
                                </div>
                            </div>         
                        </div>
                        <div class="col-sm-4 mb-4">
                            <div class="card text-center">
                                <h6 class="card-header bg-danger text-white">Штатная численность, чел.</h6> <!-- card title -->
                                <div class="card-body">         
                                    <h2 class="card-text text-danger"><?= $data['info']['stuff'] ?></h2>
                                </div>
                            </div>         
                        </div>

                    </div>

                </div>
            </div>
