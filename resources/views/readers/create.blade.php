@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Readers</h1>
        <form action="{{ route('readers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="birthday">Birthday:</label>
                <input type="date" class="form-control" id="birthday" name="birthday" required></input>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address"></textarea>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input class="form-control" id="phone" name="phone"></input>
            </div>
            <div class="d-flex justify-content-end">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
