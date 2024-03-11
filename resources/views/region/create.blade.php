@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('regionStore') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="parent" class="form-label">Hududni tanlang</label>
                        <select class="form-select @error('parent') is-invalid @enderror" id="parent" name="parent">
                            <option value="">Hududni tanlang</option>
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->region }}</option>
                            @endforeach
                        </select>
                        @error('parent')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="tuman" class="form-label">Tuman (Shahar)</label>
                        <input type="text" class="form-control @error('tuman') is-invalid @enderror" id="tuman" name="tuman" value="{{ old('name') }}">
                        @error('tuman')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Saqlash</button>
        </form>
    </div>
@endsection
