@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Restaurantes
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($restaurantes, ['route' => ['restaurantes.update', $restaurantes->id], 'method' => 'patch']) !!}

                        @include('restaurantes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection