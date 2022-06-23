@extends('layout')

@section('title', 'Preinscripción')
@section('title-description', 'Preinscripción de candidato al Celut')

@section('scripts')
@endsection

@section('content-html')

<div class="row">
    <form>
    <div class="col-6 p-4">
        <div class="row">
          <div class="col-md-6">
            <label for="validationCustom01">Eres estudiante de la UTT</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
              <label class="form-check-label" for="flexRadioDefault1">
                No
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
              <label class="form-check-label" for="flexRadioDefault2">
                Si
              </label>
            </div>
            <div class="valid-feedback">
              Información validada
            </div>
          </div>

          <div class="col-md-6">
            <select class="form-select" id="form-select-careers" style="display: none;">
              <option selected>Selecciona la carrera.</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="col-md-12">
            <label for="levelEng">Selecciona el Idioma que quieres cursar:</label>
            <select class="form-select" id="levelEng">
              <option selected hidden disabled>Slecciona las opciones</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="col-md-12">
            <label for="levelEng">Nivel</label>
            <select class="form-select" id="levelEng">
              <option selected>Selecciona la carrera.</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
            <div id="validationCustom03" class="form-text">Si no sabes tu nivel de Inglés, realiza un examen en la siguiente url <a href="">nnjds</a>.</div>
          </div>
          <div class="col-md-12">
            <label for="levelEng">Selecciona un horario:</label>
            <select class="form-select" id="levelEng">
              <option selected hidden disabled>Slecciona las opciones</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="d-grid gap-2 pt-4">
            <button class="btn btn-primary" type="submit">Inscribirse</button>
          </div>
        </div>
      </form>
    </div>
</div>
@endsection
