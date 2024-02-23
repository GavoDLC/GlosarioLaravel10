
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

<form action="{{url('/glosario/'.$glosario->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('glosario.formulario',['modo'=>'Editar'])
</form>
<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 75%;">

    <div
        class="row g-0 border rounded overflow-hidden d-inline-flex flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <h3 class="mb-0">{{isset($glosario->Nombre)?$glosario->Nombre:''}}</h3>
            <hr>
            <p class="card-text mb-auto h3">{{isset($glosario->Descripcion)?$glosario->Descripcion:''}}</p>

        </div>

        <div class="col-auto d-lg-block">
            @if(isset($glosario->Foto))
            <img src="{{asset('storage').'/'.$glosario->Foto}}" alt="" width="300">
            @endif
        </div>
    </div>
</div>
</div>
