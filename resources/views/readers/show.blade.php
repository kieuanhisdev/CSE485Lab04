@extends('layouts.app')

@section('content')
    <div class="container mt-5">
            <div >
                <h1>Reader Details</h1>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $reader->name }}</p>
                <p><strong>Birthday:</strong> {{ $reader->birthday }}</p>
                <p><strong>Address:</strong> {{ $reader->address }}</p>
                <p><strong>Phone:</strong> {{ $reader->phone }}</p>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('readers.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
