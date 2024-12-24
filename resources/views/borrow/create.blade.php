@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Borrow</h1>
        <form action="{{ route('borrow.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="reader_id">Reader:</label>
                <select class="form-control" id="reader_id" name="reader_id" required>
                    @foreach ($readers as $reader)
                        <option value="{{ $reader->id }}">{{ $reader->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="book_id">Book:</label>
                <select class="form-control" id="book_id" name="book_id" required>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="borrow_date">Borrow date:</label>
                <input type="date" class="form-control" id="borrow_date" name="borrow_date"
                    value="{{ old('borrow_date', now()->format('Y-m-d')) }}" required>
            </div>


            <div class="form-group">
                <label for="return_date">Return date:</label>
                <input type="date" class="form-control" id="return_date" name="return_date" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="0">Borrowing</option>
                    <option value="1">Returned</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('borrow.index') }}" class="btn btn-secondary">Back to List</a>
        </form>

    </div>
@endsection
