<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 75%;">

    <div
        class="row g-0 border rounded overflow-hidden d-inline-flex flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <h3 class="mb-0">{{isset($glosario->Nombre)?$glosario->Nombre:''}}</h3>
            <hr>
            <p class="card-text mb-auto">{{isset($glosario->Descripcion)?$glosario->Descripcion:''}}</p>

        </div>

        <div class="col-auto d-lg-block">
            @if(isset($glosario->Foto))
            <img src="{{asset('storage').'/'.$glosario->Foto}}" alt="">
            @endif
        </div>
    </div>
</div>
</div>
