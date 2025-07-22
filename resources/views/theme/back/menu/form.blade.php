<div class="row mb-3">
    <label for="mnu_texto" class="col-sm-2 col-form-label text-end requerido">Nombre</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="mnu_texto" id="mnu_texto" value="{{ old("mnu_texto") }}" maxlength="50" required autofocus>
    </div>
</div>
<div class="row mb-3">
    <label for="mnu_url" class="col-sm-2 col-form-label text-end requerido">Url</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="mnu_url" id="mnu_url" value="{{ old("mnu_url") }}" maxlength="100" required>
    </div>
</div>
<div class="row mb-3">
    <label for="mnu_icono" class="col-sm-2 col-form-label text-end">Icono</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="mnu_icono" id="mnu_icono" value="{{ old("mnu_icono") }}" maxlength="50">
    </div>
    <div class="col-lg-1">
      <span id="mostrar-icono" class="fa fa-fw {{ old("mnu_icono") }}"></span>
    </div>
</div>
