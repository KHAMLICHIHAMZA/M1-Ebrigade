

@extends('layouts.master')

@section('content')


<div class="container container-fluid" style="">
  <!-- general form elements disabled -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><strong>@lang('update')</strong></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">



      <form action=" {{ route('users.update',['user' => $user[0]->P_ID]) }} " method="POST">

      @csrf
        @method('PUT')
        <div class="row">

        <div class="col-sm-12">
            <!-- text input -->
            <div class="form-group">
              <label>ID</label>
              <input readOnly name="P_ID" type="text" class="form-control" placeholder="Prenom" value="{{ old ('P_ID', $user[0]->P_ID) }}" }>
            </div>
          </div>
          <div class="col-sm-12">
            <!-- text input -->
            <div class="form-group">
              <label>@lang('Prenom')</label>
              <input  name="P_PRENOM" type="text" class="form-control" placeholder="Prenom" value="{{ old ('P_PRENOM', $user[0]->P_PRENOM) }}" >
            </div>
          </div>
          <div class="col-sm-11">
            <div class="form-group">
              <label> @lang('Nom') </label>
              <input  name="P_NOM" type="text" class="form-control" placeholder="Nom" value="{{ old ('P_NOM', $user[0]->P_NOM) }}">
            </div>
          </div>
          <div class="col-sm-11">
            <div class="form-group">
              <label>@lang('Email')</label>
              <input  name="P_EMAIL" type="text" class="form-control" placeholder="Email" value="{{ old ('P_EMAIL', $user[0]->P_EMAIL) }}">
            </div>
          </div> <div class="col-sm-11">
            <div class="form-group">
              <label>@lang('Sexe') </label>
              <input  name="P_SEXE "type="text" class="form-control" placeholder="Sexe" value="{{ old ('P_SEXE', $user[0]->P_SEXE) }}">
            </div>
          </div> <div class="col-sm-11">
            <div class="form-group">
              <label>@lang('Grade')</label>
              <input  name="P_GRADE" type="text" class="form-control" placeholder="Grade" value="{{ old ('P_GRADE', $user[0]->P_GRADE) }}">
            </div>
          </div> <div class="col-sm-11">
            <div class="form-group">
              <label> @lang('Profession') </label>
              <input  name= P_PROFESSION type="text" class="form-control" placeholder="Profession" value="{{ old ('P_PROFESSION', $user[0]->P_PROFESSION) }}">
            </div>
          </div> <div class="col-sm-11">
            <div class="form-group">
              <label>@lang('Statut') </label>
              <input  name ="P_STATUT "type="text" class="form-control" placeholder="Statut" value="{{ old ('P_STATUT', $user[0]->P_STATUT) }}">
            </div>


          <div class="form-group">
          <input type="submit" class ="btn btn-primary" name="submit" value="update">

            </div>


      </form>

    </div>
    <!-- /.card-body -->


  </div>
</div>
@endsection
