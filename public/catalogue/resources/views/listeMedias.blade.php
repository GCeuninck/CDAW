@extends("template")

@section("contentBody")
    <p>test</p>
    <p>Type : {{$type ?? ""}}</p>
    <p>Annee : {{$annee ?? ""}}</p>
@endsection