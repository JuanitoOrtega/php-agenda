<?php include 'views/templates/header.php'; ?>

            <?php include 'views/templates/navbar.php'; ?>
            <div id="top" class="sa-app__body d-flex flex-column">
                <?php include 'views/templates/top.php'; ?>
                <div class="mx-xxl-3 px-4 px-sm-5 pb-5 mb-3 flex-grow-1 d-flex flex-column">
                    <div class="sa-layout flex-grow-1">
                        <div class="sa-layout__content d-flex">
                            <div class="card flex-grow-1 mx-sm-0 mx-n4">
                                <div id="calendar" class="flex-grow-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="fechaModal" tabindex="-1" aria-labelledby="fechaModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fechaModalLabel">Registrar evento</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="formEvento" method="post" autocomplete="off">
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nombreEvento" name="nombreEvento">
                                    <label for="nombreEvento" class="form-label">Nombre del evento</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="fechaEvento" name="fechaEvento">
                                    <label for="fechaEvento" class="form-label">Fecha</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="color" class="form-control" id="colorEvento" name="colorEvento">
                                    <label for="colorEvento" class="form-label">Color</label>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Eliminar</button>
                                <button type="submit" id="btnAccion" class="btn btn-primary">Guardar evento</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<?php include 'views/templates/footer.php'; ?>