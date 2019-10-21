@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Discotecas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($discotecas, ['route' => ['discotecas.update', $discotecas->id], 'method' => 'patch']) !!}

                        @include('discotecas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection