            <div class="container p-0 pt-4">

                <div class="company-info jumbotron mdb-color lighten-2 mx-3 mx-sm-0 position-relative"> <!-- mx-sm-4 -->

                    <h6 class="text-center mb-4 text-white">ДОМА В УПРАВЛЕНИИ</h6>

                    <? if($_SESSION['admin']): ?>

                    <form class="" action="/manage/set_address" method="post">
                        <div class="form-row justify-content-center mb-3">
                            <div class="form-group col-7">
                                <label for="inputAddress" class="sr-only">Введите новый адрес:</label>
                                <input type="text" class="form-control form-control-sm" id="inputAddress" name="address" placeholder="Введите адрес" required>
                            </div>
                            <div class="col-1">
                                <button type="submit" class="btn btn-outline-light btn-sm">Добавить</button>
                            </div>
                        </div>
                    </form>

                    <? endif; ?>

                    <div class="accordion" id="accordion">

                        <? foreach ($data['addresses'] as $id => $address): ?>

                            <div class="card">
                                <div class="card-header p-0 px-4" id="h<?= $id ?>">
                                    <h2 class="lh-1">
                                        <button class="btn btn-link collapsed p-0" type="button" data-toggle="collapse" data-target="#c<?= $id ?>" aria-expanded="false" aria-controls="c<?= $id ?>"><?= $address ?></button>

                                        <? if($_SESSION['admin']): ?>
                                        <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Удалить адрес" title="Удалить адрес">
                                            <span class="del-address" aria-hidden="true" data-id="<?= $id ?>">&times;</span>
                                        </button>
                                        <? endif; ?>

                                    </h2>
                                </div>
                                <div id="c<?= $id ?>" class="collapse" aria-labelledby="h<?= $id ?>" data-parent="#accordion">
                                    <div class="card-body">

                                        <? if($_SESSION['admin']): ?>
                                        <button type="button" class="btn btn-secondary btn-sm mb-3 ml-4" data-toggle="modal" data-target="#upload-modal" data-id="<?= $id ?>" data-address="<?= $address ?>">Добавить файл</button>
                                        <? endif; ?>

                                        <!--div class="d-flex justify-content-between"-->

                                        <ul class="list-group list-group-flush">

                                        <?
                                        foreach ($data['files'] as $file)
                                        {
                                            if ($file['address_id'] === $id)
                                            {
                                                echo <<<_END
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <!-- span class=""></span -->
                                                    <a href="{$file['path']}" class="text-decoration-none" target="_blank">{$file['description']}</a>
_END;
                                                if($_SESSION['admin']) {

                                                    echo <<<_END
                                                    <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Удалить файл" title="Удалить файл">
                                                        <span aria-hidden="true" class="del-file" data-file="{$file['id']}">&times;</span>
                                                    </button>
_END;
                                                }

                                                echo '</li>';
                                            } 
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        <? endforeach; ?>

                    </div>

                    <? if($_SESSION['admin']): ?>
                    <div class="modal fade" id="upload-modal" tabindex="-1" role="dialog" aria-labelledby="upload-modal-label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="upload-modal-label">Добавить файл</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="upload-form"> <!-- enctype="multipart/form-data" action="/manage/upload" method="post" -->
                                        <div class="form-group">
                                            <label for="document-description" class="col-form-label">Описание:</label>
                                            <input type="text" class="form-control" id="document-description" name="description" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file-to-upload" name="file" required>
                                                <label class="custom-file-label text-truncate" for="file-to-upload" data-browse="Обзор">Выбрать файл</label>
                                                <!--input type="submit" id="submit-upload-form" class="d-none"-->
                                            </div>       
                                        </div>
                                        <div class="form-group">
                                            <div class="btn-toolbar justify-content-end" role="toolbar">
                                                <!--button class="btn btn-secondary btn-sm mr-2" data-dismiss="modal">Закрыть</button-->
                                                <input type="submit" class="btn btn-primary btn-sm" value="Загрузить">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--div class="modal-footer">
                                    <button class="btn btn-secondary btn-sm" data-dismiss="modal">Закрыть</button>
                                    <button id="submit-upload-form" class="btn btn-primary btn-sm">Загрузить</button>
                                </div-->
                            </div>
                        </div>
                    </div>

                    <? endif; ?>

                </div>
            </div>
