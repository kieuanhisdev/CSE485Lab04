@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Borrow Details</h1>
        <p><strong>Reader:</strong> {{ $borrow->reader->name }}</p>
        <p><strong>Book:</strong> {{ $borrow->book->name }}</p>
        <p><strong>Borrow Date:</strong> {{ $borrow->borrow_date }}</p>
        <p><strong>Return Date:</strong> {{ $borrow->return_date }}</p>
        <p><strong>Status:</strong> {{ $borrow->status == 0 ? 'Borrowing' : 'Returned' }}</p>
        <a href="{{ route('borrow.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
