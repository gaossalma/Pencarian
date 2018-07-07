@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pemandu B
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pemanduB, ['route' => ['pemanduBs.update', $pemanduB->id], 'method' => 'patch']) !!}

                        @include('pemandu_bs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection