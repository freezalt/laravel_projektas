@extends('layouts.contact') 
@section('content') 
<div class="container"> 
<h2>Contact List</h2> 
    @if(session('success')) 
<div style="color: green">{{ session('success') }}</div> @endif 
<ul> 
    @foreach($contacts as $contact) 
<li>{{ $contact->name }} - {{ $contact->phone }} - {{ $contact->email }}</li> 
<form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">Ištrinti</button>
</form>
@endforeach 
</ul> 
@auth 
<a href="{{ route('contacts.create') }}">Add New Contact</a> @endauth 
</div> 
@endsection
