@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        <h1 class="">Listado de Clientes</h1>
        <a href="{{ route('client.create') }}" class="btn btn-primary">Crear cliente</a>

        @if (Session::has('message'))
            <div class="alert alert-info my-5">
                {{Session::get('message')}}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Saldo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($clients as $client)
                    <tr>
                        <td>{{$client->name}}</td>
                        <td>{{$client->due}}</td>
                        <td>
                            <a href="{{ route('client.edit', $client) }}" class="btn btn-warning">EDIT</a>

                            <form action="{{ route('client.destroy', $client) }}" method="post" class='d-inline'>
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro de elimar al cliente?')">DELETE</button>
                            </form>
                        </td>
                    </tr>

                @empty
                <tr>
                    <td colspan="3"><div class=" alert alert-danger ">No existen registros</div></td>
                </tr>
                @endforelse

            </tbody>
        </table>
        <div class="text-center">
            @if($clients->count())
                {{ $clients->links() }}
            @endif

        </div>
    </div>

@endsection
