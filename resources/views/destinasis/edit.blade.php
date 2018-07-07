@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Destinasi
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($destinasi, ['route' => ['destinasis.update', $destinasi->id], 'method' => 'patch']) !!}

                        @include('destinasis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection