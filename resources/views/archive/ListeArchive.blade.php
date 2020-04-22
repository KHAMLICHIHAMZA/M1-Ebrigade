@extends('layouts.master')

@section('content')
</br>
<div class="row">
    <div class="col-12">
        <form action="{{ route('Search') }}" id="idform" method="post" >
        @csrf
            <div class="row">
                    <div class="col-sm-2">
                        <label>Filtres par :</label>
                    </div>
                    <div class="col-sm-7">
                        <select class="form-control" style="width: 250px;" name="Filre">
                            <option value="Numero_Intervention">Numero d'Intervention</option>
                            <option value="Type_interv">Type d'Intervention</option>
                            <option value="Nom_Engin">Vehicule</option>
                            <option value="Commune">Commune</option>
                            <option value="Nom">Responsable</option>
                        </select>
                    </div>
                <div class="col-sm-3">
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <input type="text" name="Search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>    
        </br>
        <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" align="center">@lang("Numero Intervention")</th>
                        <th scope="col" align="center">@lang("Commune")</th>
                        <th scope="col" align="center">@lang("Adresse")</th>
                        <th scope="col" align="center">@lang("Type d'intervention")</th>
                        <th scope="col" align="center">@lang("Date & Heure depart")</th>
                        <th scope="col" align="center">@lang("Date & Heure de retour")</th>
                        <th scope="col" align="center">Opm</th>
                        <th scope="col" align="center">@lang("Important")</th>

                        <th scope="col" align="center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Interventions as $Intervention )
                    <tr>
                        <td scope="col" align="center">{{$Intervention->Numero_Intervention}}</td>
                        <td scope="col" align="center">{{$Intervention->Commune}}</td>
                        <td scope="col" align="center">{{$Intervention->Adresse}}</td>
                        <td scope="col" align="center"> {{$Intervention->Type_interv }}</td>
                        <td scope="col" align="center">{{$Intervention->Date_Heure_Debut }}</td>
                        <td scope="col" align="center">{{$Intervention->Date_Heure_Fin }}</td>
                        <td scope="col" align="center">{{$Intervention->Opm }}</td>
                        <td scope="col" align="center">{{$Intervention->Important }}</td>
                        <td class="d-flex flex-row" align="center">
                            <a href="http://127.0.0.1:8001/DetailsIntervention/<?php echo $Intervention->Numero_Intervention ?>"><button class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection