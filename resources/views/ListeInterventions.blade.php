@extends('layouts.master')

@section('content')
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
                            <td  class="d-flex flex-row" align="center">
                                <a href="http://127.0.0.1:8001/DetailsIntervention/<?php echo $Intervention->Numero_Intervention ?>"><button class="btn btn-sm btn-warning"><i class="fa fa-eye" ></i></button></a>
                                <a href="http://127.0.0.1:8001/ModifierIntervention/<?php echo $Intervention->Numero_Intervention ?>"><button class="btn btn-sm btn-primary"><i class="fa fa-edit" ></i></button></a>
                                <a href="http://127.0.0.1:8001/SupprimerIntervention/<?php echo $Intervention->Numero_Intervention ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-remove-format" ></i></button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
    </table>
@endsection
