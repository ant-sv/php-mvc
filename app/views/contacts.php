            <div class="container p-0 pt-4">

                <div class="company-info jumbotron mdb-color lighten-2 text-white mx-3 mx-sm-0"> <!-- mx-sm-4 -->
                    
                    <h6 class="text-center mb-4">КОНТАКТНАЯ ИНФОРМАЦИЯ</h6>

                    <!--div class="row">
                        <div class="col-sm-3 col-md-2">Адрес:</div>
                        <div class="col-sm-9 col-md-10">675000 Амурская область, г.Благовещенск, ул.Калинина, д.52</div>
                    </div-->

                    <table class="table table-sm table-striped text-white small">
                        <tbody>

                            <? $id = 0; foreach ($data['contacts'] as $row): ?>

                            <tr>
                                <td class=""><?= ++$id ?>.</td>
                                <td class="w-50"><?= $row['title'] ?></td>
                                <td class="w-50 text-right"><?= $row['value'] ?></td>

                                <? if($_SESSION['admin']): ?>

                                <td class="">
                                    <button class="btn btn-link p-0" data-toggle="modal" data-target="#edit-cont-modal" data-id="<?= $row['id'] ?>">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true" title="Изменить"></i>
                                    </button>
                                </td>

                                <? endif; ?>

                            </tr>

                            <? endforeach; ?>

                        </tbody>
                    </table>

                    <? if ($_SESSION['admin']): ?>

                    <div class="text-right">
                        <button class="btn btn-outline-light btn-sm" data-toggle="modal" data-target="#add-cont-modal">Добавить</button>
                    </div>

                    <? endif; ?>

                </div>

                <? if($_SESSION['admin']): ?>

                <div class="modal fade" id="edit-cont-modal" tabindex="-1" role="dialog" aria-labelledby="edit-cont-modal-label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="edit-cont-modal-label">Редактировать запись</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="edit-cont-form">
                                    <div class="form-group">
                                        <label for="cont-title" class="col-form-label">Заголовок:</label>
                                        <textarea class="form-control" id="cont-title" name="title" rows="2" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="cont-value" class="col-form-label">Значение:</label>
                                        <textarea class="form-control" id="cont-value" name="value" rows="2" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="btn-toolbar justify-content-end" role="toolbar">
                                            <input type="submit" name="delete" class="btn btn-danger btn-sm mr-2" value="Удалить">
                                            <input type="submit" name="edit" class="btn btn-primary btn-sm" value="Изменить">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="add-cont-modal" tabindex="-1" role="dialog" aria-labelledby="add-cont-modal-label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="add-cont-modal-label">Добавить запись</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="add-cont-form">
                                    <div class="form-group">
                                        <label for="add-title" class="col-form-label">Заголовок:</label>
                                        <textarea class="form-control" id="add-title" name="title" rows="2" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="add-value" class="col-form-label">Значение:</label>
                                        <textarea class="form-control" id="add-value" name="value" rows="2" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="btn-toolbar justify-content-end" role="toolbar">
                                            <input type="submit" name="add" class="btn btn-success btn-sm" value="Добавить">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <? endif; ?>

            </div>
