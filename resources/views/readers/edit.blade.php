@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Reader</h1>
        <form action="{{ route('readers.update', $reader->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
            <label for="name" class="form-label">Name</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="name" 
                            name="name" 
                            value="{{ $reader->name }}" 
                            required
                            placeholder="Enter reader's name">
            </div>
            <div class="form-group">
            <label for="birthday" class="form-label">Birthday</label>
                        <input 
                            type="date" 
                            class="form-control" 
                            id="birthday" 
                            name="birthday" 
                            value="{{ $reader->birthday }}" 
                            required>
            </div>
            <div class="form-group">
            <label for="address" class="form-label">Address</label>
                        <textarea 
                            class="form-control" 
                            id="address" 
                            name="address" 
                            rows="3" 
                            required
                            placeholder="Enter reader's address">{{ $reader->address }}</textarea>
            </div>
            <div class="form-group">
            <label for="phone" class="form-label">Phone</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="phone" 
                            name="phone" 
                            value="{{ $reader->phone }}" 
                            required
                            placeholder="Enter reader's phone number">
            </div>
            <div class="d-flex justify-content-between">
                        <a href="{{ route('readers.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
        </form>
    </div>
@endsection
