@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pemandu
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pemandu, ['route' => ['pemandus.update', $pemandu->id], 'method' => 'patch']) !!}

                        @include('pemandus.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection