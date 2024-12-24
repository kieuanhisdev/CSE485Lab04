@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail</h1>
        <p><strong>name:</strong> {{ $book->name }}</p>
        <p><strong>author:</strong> {{ $book->author }}</p>
        <p><strong>category:</strong> {{ $book->category }}</p>
        <p><strong>year:</strong> {{ $book->year }}</p>
        <p><strong>quantity:</strong> {{ $book->quantity }}</p>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">back</a>
    </div>
@endsection

