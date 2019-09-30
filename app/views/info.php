            <div class="container p-0 pt-4">

                <div class="company-info jumbotron mdb-color lighten-2 text-white mx-3 mx-sm-0"> <!-- mx-sm-4 -->

                    <h6 class="text-center mb-4">ОБЩИЕ СВЕДЕНИЯ ОБ ОРГАНИЗАЦИИ</h6>

                    <table class="table table-sm table-striped text-white small">
                        <tbody>

                            <? $id = 0; foreach ($data['info'] as $info): ?>

                            <tr>
                                <td class=""><? if (!isset($info['parent_id'])) echo ++$id . '.' ?></td>
                                <td class="w-50"><?= $info['title'] ?></td>
                                <td class="w-50 text-right"><?= $info['value'] ?></td>

                                <? if($_SESSION['admin']): ?>

                                <td class="">
                                    <button class="btn btn-link p-0" data-toggle="modal" data-target="#edit-info-modal" data-id="<?= $info['id'] ?>" <? if (isset($info['parent_id'])) echo ' data-sub="true"' ?>>                                        
                                        <i class="fa fa-pencil-square-o" aria-hidden="true" title="Изменить"></i>
                                    </button>
                                </td>

                                <? endif; ?>

                            </tr>

                            <?  endforeach; ?>

                        </tbody>
                    </table>

                    <? if ($_SESSION['admin']): ?>

                    <div class="text-right">
                        <button class="btn btn-outline-light btn-sm" data-toggle="modal" data-target="#add-info-modal">Добавить</button>
                    </div>

                    <? endif; ?>

                </div>

                <? if($_SESSION['admin']): ?>

                <div class="modal fade" id="edit-info-modal" tabindex="-1" role="dialog" aria-labelledby="edit-info-modal-label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="edit-info-modal-label">Редактировать запись</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="edit-info-form">
                                    <div class="form-group">
                                        <label for="edit-title" class="col-form-label">Заголовок:</label>
                                        <textarea class="form-control" id="edit-title" name="title" rows="2" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-value" class="col-form-label">Значение:</label>
                                        <textarea class="form-control" id="edit-value" name="value" rows="2"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="btn-toolbar justify-content-end" role="toolbar">
                                            <button id="sub" class="btn btn-warning btn-sm text-white mr-2" data-toggle="modal" data-target="#add-subinfo-modal">Подраздел</button>
                                            <input type="submit" name="delete" class="btn btn-danger btn-sm mr-2" value="Удалить">
                                            <input type="submit" name="edit" class="btn btn-primary btn-sm" value="Изменить">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="add-info-modal" tabindex="-1" role="dialog" aria-labelledby="add-info-modal-label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="add-info-modal-label">Добавить запись</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="add-info-form">
                                    <div class="form-group">
                                        <label for="add-title" class="col-form-label">Заголовок:</label>
                                        <textarea class="form-control" id="add-title" name="title" rows="2" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="add-value" class="col-form-label">Значение:</label>
                                        <textarea class="form-control" id="add-value" name="value" rows="2"></textarea>
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

                <div class="modal fade" id="add-subinfo-modal" tabindex="-1" role="dialog" aria-labelledby="add-subinfo-modal-label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="add-subinfo-modal-label">Добавить подраздел</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="add-subinfo-form">
                                    <div class="form-group">
                                        <label for="add-subtitle" class="col-form-label">Заголовок:</label>
                                        <textarea class="form-control" id="add-subtitle" name="title" rows="2" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="add-subvalue" class="col-form-label">Значение:</label>
                                        <textarea class="form-control" id="add-subvalue" name="value" rows="2" required></textarea>
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
