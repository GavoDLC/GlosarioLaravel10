<h1>{{$modo}} registro.</h1>

        <label for="Nombre" class="col-sm-2 col-form-label-lg">Nombre:</label><br>

        <input type="text" name="Nombre" class="" value="{{isset($glosario->Nombre)?$glosario->Nombre:''}}" id="Nombre">
        <br>
        <label for="Descripcion" class="col-sm-2 col-form-label-lg">Descripción:</label><br>

        <input type="text" name="Descripcion" value="{{isset($glosario->Descripcion)?$glosario->Descripcion:''}}" id="Descripcion">
        <br>
        <label for="Foto" class="col-sm-2 col-form-label-lg">Imagen:</label><br>

        @if(isset($glosario->Foto))
        <img src="{{asset('storage').'/'.$glosario->Foto}}" alt="" width="100">
        @endif

        <br>
        <div>
                <input type="file" name="Foto" id="Foto" class="form-control-lg">
        </div>
        <br>
        <input class="btn btn-secondary" type="submit" value="{{$modo}}">
        <a href="{{url('glosario/')}}" class="btn btn-primary">Regresar</a>
        <br>