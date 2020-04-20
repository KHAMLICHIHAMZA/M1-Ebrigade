@extends('layouts.master')

@section('content')

<table class="table table-hover">
   
                  <thead>
                    <tr>
                        
                        <th scope="col">@lang("Prenom")</th>
                        <th scope="col">@lang("Nom")</th>
                        <th scope="col">@lang("Email")</th>
                        <th scope="col">@lang("Sexe")</th>
                        <th scope="col">@lang("Grade")</th>
                        <th scope="col">@lang("Profession")</th>
                        <th scope="col">@lang("Statut")</th>

                        <th scope="col">@lang("Action")</th>
                    </tr>
                  </thead>
                  <tbody>
                      
                  @foreach($users as $user)

                  <tr <?php // if ($_SESSION['username'] != $user['P_CODE'] && ($Intervention->ispersonnel($_SESSION['username']) == true or $Intervention->isresponsable($_SESSION['username']) == true)) echo "hidden" ?> >
                        <td scope="col">{{$user->P_PRENOM}}</td>
                        <td scope="col">{{$user->P_NOM}}</td>
                        <td scope="col">{{$user->P_EMAIL}}</td>
                        <td scope="col">{{$user->P_SEXE }}</td>
                        <td scope="col">{{$user->P_GRADE }}</td>
                        <td scope="col">{{$user->P_PROFESSION }}</td>
                        <td scope="col">{{$user->P_STATUT }}</td>

                        <td  class="d-flex flex-row" >

                        <form  class="mr-1" method="" action="{{ route('users.edit',['user' => $user->P_ID]) }}">
                        <button class="btn btn-sm btn-warning"><i class="fa fa-edit" ></i></button>
                      </form>



                      <form  class="mr-1"  @if ( ! App\Http\Controllers\InterventionController::isresponsable(session('P_CODE'))) hidden  @endif method="" action="{{ route('user.delete',['us' => $user->P_ID]) }}">

                        <button name class="btn btn-sm btn-danger"><i class="fa fa-trash" ></i></button>

                        <input type="hidden" name="" value="">

                     </form>


                        <form  class="mr-1" method="" action="{{ route('users.show',['user' => $user->P_ID]) }}">
                          <input type="hidden" name="P_ID" value="">
                          <a >
                           <button class="btn btn-sm btn-info"><i class="fa fa-eye" ></i></button>
                          </a>
                      </form>





                        </td>

                    </tr>
                    @endforeach


                  </tbody>
                  <!--jusque la qui doit changer-->
                </table>

@endsection
