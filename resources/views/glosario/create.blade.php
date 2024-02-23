<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

{{-- enviar datos a url del glosario 
    php artisan route:list para ver el metodo utilizado para recibir los datos--}}
    <form action="{{url('/glosario')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('glosario.formulario',['modo'=>'Crear'])
    </form>
    