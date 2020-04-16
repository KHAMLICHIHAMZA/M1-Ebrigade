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
    <form action="{{ route('UpdateIntervention') }}" id="idform" method="post">
        @csrf
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><strong>Intervention :</strong></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">

                            <label id="Numero_Intervention">Numero d'intervention </label>
                            <input type="text" class="form-control" name="Numero_Intervention" id="Numero_Intervention" value="{{$Interventions[0][0]->Numero_Intervention}}" readonly>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Commune d'intervention</label>
                            <input type="text" class="form-control" name="Commune" value="{{$Interventions[0][0]->Commune}}" placeholder="Lieu d'intervention" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Adresse d'intervention</label>
                            <input type="text" class="form-control" name="Adresse" value="{{$Interventions[0][0]->Adresse}}" placeholder="Lieu d'intervention" readonly>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>Type d'intervention</label>
                            <select class="form-control" name="Type_interv" readonly>
                                <?php
                                $Type = $Interventions[0][0]->Type_interv;
                                foreach ($Type_Inters as $Type_Inter) :
                                ?>
                                    <option value="<?php echo $Type_Inter['TI_CODE']; ?>" <?php if ($Type == $Type_Inter['TI_CODE']) { ?> selected<?php } ?>> <?php echo $Type_Inter['TI_CODE']; ?> </option>
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
                            <label>Date & Heure de declanchement :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="datetime" class="form-control float-right" name="Date_Heure_Debut" value="{{$Interventions[0][0]->Date_Heure_Debut}}" id="reservation" readonly>
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Date & Heure de fin :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="datetime" class="form-control float-right" name="Date_Heure_Fin" value="{{$Interventions[0][0]->Date_Heure_Fin}}" id="reservation" readonly>
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- checkbox -->
                        <div class="form-group">
                            <div class="form-check" id="Important">
                                <input class="form-check-input" name="Important" type="checkbox" id="Important" <?php if($Interventions[0][0]->Important =='on'): ?> checked <?php endif ?> readonly>
                                <label class="form-check-label" id="Important">Important</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- checkbox -->
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" name="Opm" type="checkbox" <?php if($Interventions[0][0]->Opm =='on'): ?> checked <?php endif ?> readonly>
                                <label class="form-check-label"> OPM </label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- general form elements disabled -->
            <div class="card-primary">
                <div class="card-header">
                    <h3 class="card-title"><strong>Engins et personnel :</strong></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- select -->
                            <div class="form-group">
                                <label>Nom de l'engin N1</label>
                                <select class="form-control" name="Nom_Engin" id="Nom_Engin" readonly>
                                    <?php
                                    $Engins = InterventionController::getAllEngins();
                                    $Eng = $Interventions[2][0]->Nom_Engin;
                                    foreach ($Engins as $Engin) :
                                    ?>
                                        <option value="<?php echo $Engin['TV_CODE']; ?>" <?php if ($Eng == $Engin['TV_CODE']) : ?> selected > <?php echo $Engin['TV_LIBELLE']; endif ?> </option readonly>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div id="content">

                    </div>
                    <!-- input states -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date & Heure depart :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="datetime" class="form-control float-right" name="Date_Heur_Depart" value="{{$Interventions[2][0]->Date_Heur_Depart}}" id="reservation" readonly>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date & Heure d'arriver sur le lieux :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="datetime" class="form-control float-right" name="Date_Heure_Arriver" value="{{$Interventions[2][0]->Date_Heure_Arriver}}" id="reservation" readonly>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>
                    <!-- input states -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date & Heure de retour :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="datetime" class="form-control float-right" name="Date_Heure_Retour" value="{{$Interventions[2][0]->Date_Heure_Retour}}" id="reservation" readonly>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-header">
                    <h3 class="card-title"><strong> Responsable </strong></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Responsable</label>
                                <input type="text" class="form-control" name="Nom" value="{{$Interventions[1][0]->Nom}}" placeholder="Nom & Prenom" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- select -->
                            <div class="form-group"></br>
                                <a href="http://127.0.0.1:8000/ModifierIntervention/<?php echo $Interventions[0][0]->Numero_Intervention ?>">
                                    <button type="submit" class="btn btn-block btn" name="submit" value="Valider Formulaire">Modifier l'intervention</boutton>
                                </a>
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