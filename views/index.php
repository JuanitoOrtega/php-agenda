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
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                    <input type="hidden" id="id" name="id">
                                    <label for="nombre" class="form-label">Nombre del evento</label>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="datetime-local" class="form-control" id="fecha_inicio" name="fecha_inicio">
                                            <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" value="00:00">
                                            <label for="hora_inicio" class="form-label">Hora de inicio</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="datetime-local" class="form-control" id="fecha_fin" name="fecha_fin">
                                            <label for="fecha_fin" class="form-label">Fecha de finalización</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="time" class="form-control" id="hora_fin" name="hora_fin" value="00:00">
                                            <label for="hora_fin" class="form-label">Hora de finalización</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="color" class="form-control" id="color" name="color">
                                    <label for="color" class="form-label">Color</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" id="btnEliminar" class="btn btn-danger">Eliminar</button>
                                <button type="submit" id="btnAccion" class="btn btn-primary">Registrar evento</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<?php include 'views/templates/footer.php'; ?>