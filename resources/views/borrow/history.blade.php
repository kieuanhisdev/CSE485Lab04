@extends('layouts.app')
@section('content')
    <div class="container mt-5" style="height: 70vh;">
        <h1 class=" ">Borrowing History</h1>
        <h3 class="">Reader: {{ $reader->name }}</h3>
        @if ($borrows->isEmpty())
            <p class="text-center">This reader has no borrowing history.</p>
        @else
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Book Name</th>
                        <th>Borrow Date</th>
                        <th>Return Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($borrows as $borrow)
                        <tr>
                            <td>{{ $borrow->id }}</td>
                            <td>{{ $borrow->book->name }}</td>
                            <td>{{ $borrow->borrow_date }}</td>
                            <td>{{ $borrow->return_date ?? 'Not returned' }}</td>
                            <td>{{ $borrow->status == 1 ? 'Returned' : 'Borrowing' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <div class="mt-3">
            <a href="{{ route('borrow.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
