@extends('layouts.app')
@php $num = $appeals->firstItem() @endphp
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
                    <th>F.I.O.</th>
                    <th>Hudud</th>
                    <th>Tuman</th>
                    <th>Manzil</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Tadbirkor</th>
                    <th>Tadbirkor nomi</th>
                    <th>Jins</th>
                    <th>Tug'ilgan sana</th>
                    <th>Maqom</th>
                    <th>Fayl</th>
                    <th>Xizmat</th>
                    <th>Murojaat mazmuni</th>
                </tr>
                </thead>
                <tbody>
                @foreach($appeals as $appeal)
                    <tr>
                        <td style="width: 50px">{{ $num++ }}</td>
                        <td>{{ $appeal->fio }}</td>
                        <td>{{ $appeal->region }}</td>
                        <td>{{ $appeal->region }}</td>
                        <td>{{ $appeal->manzil }}</td>
                        <td>{{ $appeal->email }}</td>
                        <td>{{ $appeal->tel }}</td>
                        <td>{{ $appeal->tad }}</td>
                        <td>{{ $appeal->tadname }}</td>
                        <td>{{ $appeal->jins }}</td>
                        <td>{{ $appeal->tugilgan }}</td>
                        <td>{{ $appeal->maqom }}</td>
                        <td>{{ $appeal->files }}</td>
                        <td>{{ $appeal->xizmat }}</td>
                        <td>{{ $appeal->vitext }}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{ $appeals->links() }}
        </div>
    </div>
@endsection
