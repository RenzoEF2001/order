<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?= '<pre>' ?>
                        <?= print_r($error) ?>
                        <form method="post" action="<?= site_url('pruebas/prueba_save') ?>" enctype="multipart/form-data">
                            <input name="imagen0[]" type="file" multiple>
                            <br>
                            <input name="imagen1[]" type="file" multiple>
                            <br>
                            <input name="imagen2[]" type="file" multiple>
                            <br>
                            <input name="imagenCodig" type="file" multiple>
                            <br>
                            <input type="submit" value="guardar">
                        </form>
                        <form method="post" action="<?= site_url('pruebas/prueba_codig') ?>" enctype="multipart/form-data">
                            <input name="imagenCodig" type="file" multiple>
                            <br>
                            <input type="submit" value="guardar">
                        </form>
                        <br>
                        <br>
                        <br>
                        <div>
                            <input id="imagenPrueba" type="file" multiple>
                            <br>
                            <input id="botonPrueba" type="button" value="guardar">
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>