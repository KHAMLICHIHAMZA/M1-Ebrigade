@extends('layouts.master')

@section('content')
<?php
use App\Http\Controllers\InterventionController;
use GuzzleHttp\Psr7\Request;

$Type_Inters = InterventionController::getAllType();
?>
</br>
<div class="container container-fluid" style="width:1000px; float:left; margin-left:10px;">
  <!-- general form elements disabled -->
  <form action="{{ route('AddInfoIntervention') }}" id="idform" method="post" >
  @csrf
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title"><strong>@lang("Intervention") :</strong></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">

        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">

              <label id="Commune">@lang("Commune d'intervention") </label>
              <input type="text" class="form-control" name="Commune" id="Commune" placeholder="Commune ...">

            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>@lang("Adresse d'intervention")</label>
              <input type="text" class="form-control" name="Adresse" placeholder="Lieu d'intervention">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <!-- select -->
            <div class="form-group">
              <label>@lang("Type d'intervention")</label>
              <select class="form-control" name="Type_interv">
                <?php
                foreach ($Type_Inters as $Type_Inter) :
                ?>
                  <option value="<?php echo $Type_Inter['TI_CODE']; ?>"> <?php echo $Type_Inter['TI_CODE']; ?> </option>
                <?php
                endforeach;
                ?>
              </select>
            </div>
          </div>
        </div>

        <!-- input states -->
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>@lang("Date & Heure de declanchement")</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                </div>
                <input type="datetime-local" class="form-control float-right" name="Date_Heure_Debut" id="reservation">
              </div>
              <!-- /.input group -->
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>@lang("Date & Heure de fin")</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                </div>
                <input type="datetime-local" class="form-control float-right" name="Date_Heure_Fin" id="reservation">
              </div>
              <!-- /.input group -->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <!-- checkbox -->
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" name="Important" type="checkbox" checked>
                <label class="form-check-label">@lang("Important")</label>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <!-- checkbox -->
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" name="Opm" type="checkbox" checked>
                <label class="form-check-label"> OPM </label>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- general form elements disabled -->
      <div class="card-primary">
        <div class="card-header">
          <h3 class="card-title"><strong>@lang("Engins et personnel")</strong></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

          <div class="row">
            <div class="col-sm-6">
              <!-- select -->
              <div class="form-group">
                <label>@lang("Nom de l'engin")</label>
                <select class="form-control" name="Nom_Engin" id="Nom_Engin">
                  <?php
                  $Engins = InterventionController::getAllEngins();
                  foreach ($Engins as $Engin) :
                  ?>
                    <option value="<?php echo $Engin['TV_CODE']; ?>"> <?php echo $Engin['TV_LIBELLE']; ?> </option>
                  <?php endforeach; ?>
                </select>

              </div>
            </div>
            <div class="col-sm-3">
              <!-- select -->
              <div class="form-group"></br>
                <button type="" class="btn btn-block btn-success" id="submitBtn" value="submitBtn">@lang("Valider")</button>
              </div>
            </div>
          </div>
          <div id="content">

          </div>
          <!-- input states -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>@lang("Date & Heure depart")</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                    </span>
                  </div>
                  <input type="datetime-local" class="form-control float-right" name="Date_Heur_Depart" id="reservation">
                </div>
                <!-- /.input group -->
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>@lang("Date & Heure d'arriver sur le lieux")</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                    </span>
                  </div>
                  <input type="datetime-local" class="form-control float-right" name="Date_Heure_Arriver" id="reservation">
                </div>
                <!-- /.input group -->
              </div>
            </div>
          </div>
          <!-- input states -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>@lang("Date & Heure de retour")</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                    </span>
                  </div>
                  <input type="datetime-local" class="form-control float-right" name="Date_Heure_Retour" id="reservation">
                </div>
                <!-- /.input group -->
              </div>
            </div>
          </div>

        </div>

        <div class="card-header">
          <h3 class="card-title"><strong> @lang("Responsable") </strong></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Responsable</label>
                <input type="text" class="form-control" name="Nom" placeholder="Nom & Prenom">
              </div>
            </div>
            <div class="col-sm-6">
              <!-- select -->
              <div class="form-group"></br>
                <button type="submit" class="btn btn-block btn-success" name="submit" value="Valider Formulaire">@lang("Valider l'ajout du formulaire")</boutton>
              </div>
            </div>
          </div>

        </div>
      </div>
  </form>

  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script>
    function test() {
      //alert("testOK")+$_POST['Role1'];
    }
    $(document).ready(function() {
      $('input[type=submit]').submit(
        function(e) {
          alert("aleeert");
          e.preventDefault();
          //$("submit").attr("disabled", true);
          $.ajax({
            type: 'post',
            url: 'post.php',
            data: $('#idform').serialize(),
            success: function() {
              alert('form was submitted');
            }
          });
        });
    });
    $('#submitBtn').click(function(event) {
      event.preventDefault();
      var name = $('#Nom_Engin').val();
      $.ajax({
        url: '/php',
        data: 'name=' + name,
        success: function(data) {
          $('#content').html(data);
        },
        error: function() {
          alert('failure');
        }
      });
    });
  </script>
  <!--<div id="content"></div>-->
@endsection
