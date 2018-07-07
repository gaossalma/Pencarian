@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Destinasi Pemandu
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($destinasiPemandu, ['route' => ['destinasiPemandus.update', $destinasiPemandu->id], 'method' => 'patch']) !!}

                        @include('destinasi_pemandus.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection