@extends('layouts.master')
@section('content')
<div class="card col-md-12 card-primary card-outline">
    <div class="card-body box-profile">
      <div class="text-center">
             <div class="row">
                <div class="col-md-12">
                  <!-- small card -->
                  <div class="card">
                      <div class="small-box bg-info">
                           <div class="inner">
                              <h3>{{ $Interventions }}</h3>
      
                              <p>Nombre d'interventions</p>
                               </div>
                              <div class="icon">
                      <i class="fas fa-abacus"></i>
                    </div>
                    <a href="http://localhost:8001/AllIntervention" class="small-box-footer">
                      details d'interventions<i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>
            </div>

      <div class="row">
        <div class="col-12">
            <form action="{{ route('SearchIntervention') }}" id="idform" method="post" >
            @csrf
                <div class="row">
                        <div class="col-sm-2">
                            <label>Filtres par </label>
                        </div>
                        <div class="col-sm-7">
                            <select class="form-control" style="width: 250px;" name="Filre">
                                <option value="Numero_Intervention">Numero d'Intervention</option>
                                <option value="Type_interv">Type d'Intervention</option>
                                <option value="Nom_Engin">Vehicule</option>
                                <option value="Commune">Commune</option>
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

            </div>
        </div>
</div>


    </div>

    
</div>



@endsection