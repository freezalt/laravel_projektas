@extends('layouts.layout')


@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-danger text-white">
            <h1 class="mb-0">Ištrinti studentai</h1>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif


            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Vardas</th>
                        <th>Telefonas</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $Contact)
                        <tr>
                            <td>{{ $Contact->id }} - {{ $Contact->name }} - {{ $Contact->phone }} - {{ $Contact->email }}</td>
                            <td>
                                <form action="{{ route('contacts.restore', $contact->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Atkurti</button>
                                </form>


                                <form action="{{ route('contacts.forceDelete', $contact->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Ar tikrai norite visiškai ištrinti?')">Ištrinti visam laikui</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            {{ $contacts->links() }}


            <a href="{{ route('contacts.index') }}" class="btn btn-primary mt-3">Grįžti į kontaktu sąrašą</a>
        </div>
    </div>
</div>
@endsection
