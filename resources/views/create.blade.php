@extends('layouts.app')

@section('title', 'Create A New Task')

@section('styles')
    <style>
        .error-msg{
            color:red;
            font: 0.8rem;
        }
    </style>
@endsection
@section('content')
    <div>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div>
                <label for="title">title</label>
                <input type="text"
                    @class(['border-red-500' => $errors->has('title')])
                    id="title"
                    name="title"
                    value="{{ old('title')}}">
                @error('title')
                    <p class="error-msg">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="description">description</label>
                <textarea name="description"
                    id="description"
                    rows="5"
                    @class(['border-red-500' => $errors->has('title')])
                    >
                    {{ old('description')}}
                </textarea>
                @error('description')
                <p class="error-msg">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="long_description">long description</label>
                <textarea name="long_description"
                    id="long_description"
                    rows="5"
                    @class(['border-red-500' => $errors->has('title')])
                    >
                    {{ old('long_description')}}
                </textarea>
                @error('long_description')
                <p class="error-msg">{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" class="btn">
            <a href="{{ route('tasks.index') }}" class="link">Cancel</a>
        </form>
    </div>
@endsection
