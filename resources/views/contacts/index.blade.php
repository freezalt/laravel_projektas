@extends('layouts.contact') 
@section('content') 
<div class="container"> 
    <h2>Contact List</h2> 
        @if(session('success')) 
        <div style="color: green">{{ session('success') }}</div> 
        @endif 
        <ul> 
        @foreach($contacts as $Contact) 
            <li>{{ $Contact->id }} - {{ $Contact->name }} - {{ $Contact->phone }} - {{ $Contact->email }}</li> 
                <form action="{{ route('contacts.destroy', $Contact->id) }}" method="POST" class="d-inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Ištrinti</button>
                </form>
        @endforeach 
</ul> 
@auth 
    <a href="{{ route('contacts.create') }}">Add New Contact</a><br>
     <a href="{{ route('contacts.trashed') }}" class="btn btn-success">Rodyti pašalintus</a><br>
     <a href="{{ route('submit.form') }}">forma</a>
@endauth 
</div> 
@endsection
