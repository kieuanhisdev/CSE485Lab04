@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-secondary text-white text-center">
                        <h2>Reader Details</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row" style="width: 30%;">Name</th>
                                    <td>{{ $reader->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Birthday</th>
                                    <td>{{ \Carbon\Carbon::parse($reader->birthday)->format('d/m/Y') ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Address</th>
                                    <td>{{ $reader->address ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone</th>
                                    <td>{{ $reader->phone ?? 'N/A' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('readers.index') }}" class="btn btn-secondary">Back</a>
                        <a href="{{ route('readers.edit', $reader->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
