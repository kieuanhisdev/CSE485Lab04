@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Confirm Delete</h1>
        <p>Are you sure you want to delete the book: <strong>{{ $book->title }}</strong>?</p>

        <form action="{{ route('books.destroy', $book) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
