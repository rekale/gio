@extends('layouts.admin.app')

@section('content')
    <section class="content-header">
        <h1>
            Cargo Letter
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cargoLetter, ['route' => ['admin.cargoLetters.update', $cargoLetter->id], 'method' => 'patch']) !!}

                        @include('admin.cargo_letters.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
