@extends("template")

@section("contentBody")
    <div class="container">
        <p>test categories</p>
        @foreach ($categories as $category)
            <b> {{$category->name}}</b><br>
        @endforeach
    </div>

@endsection