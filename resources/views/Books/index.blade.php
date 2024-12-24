
@extends('layouts.app')

@section('content')
    <div class="container container mt-5">
        <h1>List book</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary">add new book</a>
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
    <div class="d-flex justify-content-end">
        {{ $books->links() }}
    </div>
@endsection





