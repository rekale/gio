@extends('layouts.admin.app')

@section('content')
    <section class="content-header">
        <h1>
            Travel Document
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($travelDocument, ['route' => ['admin.travelDocuments.update', $travelDocument->id], 'method' => 'patch']) !!}

                        @include('admin.travel_documents.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
