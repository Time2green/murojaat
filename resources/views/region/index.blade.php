@extends('layouts.app')
@php $num = $regions->firstItem() @endphp
@section('content')
    <div class="container">
        <div class="text-end">
            <a class="btn btn-success" href="{{ route('regionCreate') }}"><i class="fa-solid fa-plus"></i> Qo'shish</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tuman (Shahar)</th>
                        <th>Amallar</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($regions as $region)
                    <tr>
                        <td style="width: 50px">{{ $num++ }}</td>
                        <td>{{ $region->region }}</td>
                        <td style="width: 50px">
                            <a href="{{ route('regionEdit', $region->id) }}"><i class="fa-solid fa-pen"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{ $regions->links() }}
        </div>
    </div>
@endsection
