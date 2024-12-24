@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Borrow</h1>
        <form action="{{ route('borrow.update', $borrow->id) }}" method="POST" class="p-4">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="reader_id" class="form-label">Reader:</label>
                <select class="form-select" id="reader_id" name="reader_id" required>
                    <option value="">-- Select Reader --</option>
                    @foreach ($readers as $reader)
                        <option value="{{ $reader->id }}" {{ $borrow->reader_id == $reader->id ? 'selected' : '' }}>
                            {{ $reader->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="book_id" class="form-label">Book:</label>
                <select class="form-select" id="book_id" name="book_id" required>
                    <option value="">-- Select Book --</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}" {{ $borrow->book_id == $book->id ? 'selected' : '' }}>
                            {{ $book->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="borrow_date" class="form-label">Borrow Date:</label>
                <input type="date" class="form-control" id="borrow_date" name="borrow_date"
                    value="{{ $borrow->borrow_date }}" required>
            </div>

            <div class="mb-3">
                <label for="return_date" class="form-label">Return Date:</label>
                <input type="date" class="form-control" id="return_date" name="return_date"
                    value="{{ $borrow->return_date }}">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="0" {{ $borrow->status == 0 ? 'selected' : '' }}>Borrowing</option>
                    <option value="1" {{ $borrow->status == 1 ? 'selected' : '' }}>Returned</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-45">Save</button>
            <a href="{{ route('borrow.index') }}" class="btn btn-secondary w-45">Back to List</a>
        </form>
    </div>
@endsection
