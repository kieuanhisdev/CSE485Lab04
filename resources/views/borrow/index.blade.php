@extends('layouts.app')
{{-- @extends('tasks.delete') --}}
@section('content')
    <div class="container">
        <h1>Borrow List</h1>
        @if (session('success'))
            <div class="text-success"> {{ session('success') }}</div>
        @endif
        <a href="{{ route('borrow.create') }}" class="btn btn-primary">Add</a>
        <table class="table">
            <thead>
                <tr>
                    <th class="">ID</th>
                    <th class="">Reader</th>
                    <th class="">Book</th>
                    <th class="">Borrow Date</th>
                    <th class="">Return Date</th>
                    <th class="">Status</th>
                    <th class="" style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrows as $index => $borrow)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $borrow->docgia }}</td>
                        <td>{{ $borrow->tensach }}</td>
                        <td>{{ $borrow->ngaymuon }}</td>
                        <td>{{ $borrow->ngaytra }}</td>
                        <td>
                            <span class="{{ $borrow->trangthai ? 'text-success' : 'text-danger' }}">
                                {{ $borrow->trangthai ? 'Returned' : 'Borrowing' }}
                            </span>
                        </td>

                        <td>
                            <div class="d-flex align-items-center" style="height: 100%;">
                                <form action="{{ route('borrow.updateStatus', $borrow->id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-primary">Return Book</button>
                                </form>

                                <a href="{{ route('borrow.show', $borrow->id) }}" class="btn btn-info mx-2">
                                    <i class="bi bi-eye-fill"></i>
                                </a> <a href="{{ route('borrow.edit', $borrow->id) }}" class="btn btn-warning mx-2"> <i
                                        class="bi bi-pencil-fill"></i> </a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $borrow->id }}"
                                    class="btn btn-danger mx-2">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                                <a href="{{ route('borrow.history', $borrow->id) }}" class="btn btn-success"><i
                                        class="bi bi-clock-history"></i></a>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="deleteModal{{ $borrow->id }}" tabindex="-1"
                        aria-labelledby="deleteModalLabel{{ $borrow->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{ $borrow->id }}">Confirm Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('borrow.destroy', $borrow->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
        <div class="paginastion">
            {{ $borrows->links() }}
        </div>
    </div>
@endsection
