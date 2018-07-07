@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bahasa Pemandu
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($bahasaPemandu, ['route' => ['bahasaPemandus.update', $bahasaPemandu->id], 'method' => 'patch']) !!}

                        @include('bahasa_pemandus.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection