@extends('layouts.master')
@section('content')
          <!-- Profile Image -->
            <div class="card col-md-12 card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="../../dist/img/user4-128x128.jpg"
                         alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center">{{$user->P_NOM."".$user->P_PRENOM."".$user->P_PRENOM2}}</h3>

                  <p class="text-muted text-center">grade: {{$user->P_GRADE}}<br>statut: {{$user->P_STATUT}}</p>


                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Prenom</b> <a class="float-right">{{$user->P_PRENOM."".$user->P_PRENOM2}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Nom</b> <a class="float-right">{{$user->P_NOM}}</a>
                    </li>

                    <li class="list-group-item">
                        <b>date d'engagement</b> <a class="float-right">{{$user->P_DATE_ENGAGEMENT}}</a>
                      </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="float-right">{{$user->P_EMAIL}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Tel</b> <a class="float-right">{{$user->P_PHONE}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Adresse</b> <a class="float-right">{{$user->P_ADDRESS." ".$user->P_ZIP_CODE." ".$user->P_CITY}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Pays</b> <a class="float-right">{{$user->P_PAYS}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Service</b> <a class="float-right">{{$user->SERVICE}}</a>
                      </li>

                  </ul>
                     <div class="btn-group btn-group-lg col-md-12">
                  <a href="http://localhost:8001/users" class="  btn btn-primary   "><b>retour</b></a>

                  <a href="{{ route('users.edit',['user' => $user->P_ID]) }}" class="btn btn-sm btn-warning  "><b>update</b></a>

                  </div>





                </div>
                <!-- /.card-body -->
              </div>

@endsection
