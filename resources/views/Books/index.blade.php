
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
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                onclick="setDeleteAction('{{ route('books.destroy', $book->id) }}')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="paginastion">
        {{ $books->links() }}
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this book?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function setDeleteAction(actionUrl) {
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.setAttribute('action', actionUrl);
        }
    </script>
@endsection





