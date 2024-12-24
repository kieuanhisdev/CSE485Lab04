
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add new book</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="author">author:</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <div class="form-group">
                <label for="category">category:</label>
                <textarea class="form-control" id="category" name="category"></textarea>
            </div>
            <div class="form-group">
                <label for="year">year:</label>
                <input type="text" class="form-control" id="year" name="year" required>
            </div>
            <div class="form-group">
                <label for="quantity">quantity:</label>
                <input type="text" class="form-control" id="quantity" name="quantity" required>
            </div>
            <button type="submit" class="btn btn-primary">save</button>
        </form>
    </div>
@endsection

