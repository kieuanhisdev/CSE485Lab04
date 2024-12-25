
@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Book List</h1>
            <a href="{{ route('books.create') }}" class="btn btn-primary">Add</a>
        </div>
        <table class="table table-bordered table-striped text-center align-middle">
            <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>author</th>
                <th>category</th>
                <th>year</th>
                <th>quantity</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{$book->category}}</td>
                    <td>{{$book->year}}</td>
                    <td>{{ $book->quantity}}</td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm"><i
                                class="bi bi-eye"></i></a>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm"><i
                                class="bi bi-pencil"></i></a>
                        <a href="{{ route('books.confirmDelete', $book) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="paginastion">
        {{ $books->links() }}
    </div>
@endsection





