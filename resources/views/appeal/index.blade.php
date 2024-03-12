@extends('layouts.app')
@php $num = $appeals->firstItem() @endphp

@section('style')
    <style>
        .box-shadow{
            margin: 1rem;
            box-shadow: 1px 11px 11px -1px rgba(0,0,0,0.14);
            -webkit-box-shadow: 1px 11px 11px -1px rgba(0,0,0,0.14);
            -moz-box-shadow: 1px 11px 11px -1px rgba(0,0,0,0.14);
        }
        .card{
            border-radius: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="table-responsive">

            @foreach($appeals as $appeal)
                <div class="p-3 box-shadow row position-relative">
                    <div class="col-md-5">
                        <div class="d-flex flex-column">
                            <div class="p-2">
                                <span class="pe-2"><i class="fa-solid fa-user"></i></span>
                                <span>{{ $appeal->fio }}</span>
                            </div>
                            <div class="p-2">
                                <span class="pe-2"><i class="fa-solid fa-location-dot"></i></span>
                                <span>{{ $appeal->hudud->region.", ".$appeal->tuman->region.", ".$appeal->manzil }}</span>
                            </div>
                            <div class="p-2">
                                <span class="pe-2"><i class="fa-solid fa-phone"></i></span>
                                <span>{{ $appeal->tel }}</span>
                            </div>
                            <div class="p-2">
                                <span class="pe-2"><i class="fa-solid fa-envelope"></i></span>
                                <span>{{ $appeal->email }}</span>
                            </div>
                            <div class="p-2">
                                @if($appeal->tad == 1)
                                    <span data-bs-toggle="tooltip" title="Tadbirkormi?" class="pe-2"><i class="fa-solid fa-circle-xmark text-danger"></i></span>
                                    <span>{{ \App\Models\Helper::tad($appeal->tad) }}</span>
                                @else
                                    <span data-bs-toggle="tooltip" title="Tadbirkormi?" class="pe-2"><i class="fa-solid fa-circle-check text-success"></i></span>
                                    <span>{{ \App\Models\Helper::tad($appeal->tad) }}</span><br>
                                    <span class="pe-2"><i class="fa-solid fa-user-tie"></i></span>
                                    <span>{{ $appeal->tadname }}</span>
                                @endif
                            </div>
                            <div class="p-2">
                                @if($appeal->jins == 1)
                                    <span class="pe-2"><i class="fa-solid fa-user text-primary"></i></span>
                                    <span>{{ \App\Models\Helper::jins($appeal->jins) }}</span>
                                @else
                                    <span class="pe-2"><i class="fa-solid fa-user text-success"></i></span>
                                    <span>{{ \App\Models\Helper::jins($appeal->jins) }}</span><br>
                                @endif
                            </div>
                            <div class="p-2">
                                <span class="pe-2"><i class="fa-solid fa-calendar-days"></i></span>
                                <span>{{ $appeal->tugilgan }}</span>
                            </div>
                            <div class="p-2">
                                <span class="pe-2"><i class="fa-solid fa-list-check"></i></span>
                                <span>{{ \App\Models\Helper::maqom($appeal->maqom) }}</span>
                            </div>
                            <div class="p-2">
                                <span class="pe-2"><i class="fa-solid fa-file-lines"></i></span>
                                <span>{{ \App\Models\Helper::xizmat($appeal->xizmat) }}</span>
                            </div>
                            @if($appeal->files)
                                <div class="p-2">
                                    @if(in_array(pathinfo($appeal->files, PATHINFO_EXTENSION), ['jpg', 'jpeg']))
                                        <a href="{{ route('download', $appeal->id) }}"><i class="fa-regular fa-file-image"></i> Rasmni yuklash</a>
                                    @elseif(pathinfo($appeal->files, PATHINFO_EXTENSION) == "pdf")
                                        <a href="{{ route('download', $appeal->id) }}"><i class="fa-regular fa-file-pdf"></i> PDFni yuklash</a>
                                    @elseif(in_array(pathinfo($appeal->files, PATHINFO_EXTENSION), ['rar', 'zip']))
                                        <a href="{{ route('download', $appeal->id) }}"><i class="fa-regular fa-file-zipper"></i> Arxivni yuklash</a>
                                    @endif
                                </div>
                            @endif
                            <span class="p-2">{!! \App\Models\Appeal::status($appeal->status) !!}</span>
                        </div>
                    </div>
                    <div class="col-md-7 position-relative">
                        <div class="d-flex justify-content-between"><span><b>Murojaat mazmuni:</b></span> <span class="btn btn-sm btn-primary mb-1"><b>Kelib tushgan sana:</b> {{ $appeal->created_at }}</span></div>
                        <div class="card p-2">
                            {{ $appeal->vitext }}
                        </div>
                    </div>
                </div>
            @endforeach
{{--            <table class="table table-hover">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th>#</th>--}}
{{--                    <th>F.I.O.</th>--}}
{{--                    <th>Hudud</th>--}}
{{--                    <th>Tuman</th>--}}
{{--                    <th>Manzil</th>--}}
{{--                    <th>Email</th>--}}
{{--                    <th>Telefon</th>--}}
{{--                    <th>Tadbirkor</th>--}}
{{--                    <th>Tadbirkor nomi</th>--}}
{{--                    <th>Jins</th>--}}
{{--                    <th>Tug'ilgan sana</th>--}}
{{--                    <th>Maqom</th>--}}
{{--                    <th>Fayl</th>--}}
{{--                    <th>Xizmat</th>--}}
{{--                    <th>Murojaat mazmuni</th>--}}
{{--                    <th>Holati</th>--}}
{{--                    <th>Kalit so'z</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach($appeals as $appeal)--}}
{{--                    --}}
{{--                    --}}
{{--                    <tr>--}}
{{--                        <td style="width: 50px">{{ $num++ }}</td>--}}
{{--                        <td>{{ $appeal->fio }}</td>--}}
{{--                        <td>{{ $appeal->hudud_id }}</td>--}}
{{--                        <td>{{ $appeal->tuman_id }}</td>--}}
{{--                        <td>{{ $appeal->manzil }}</td>--}}
{{--                        <td>{{ $appeal->email }}</td>--}}
{{--                        <td>{{ $appeal->tel }}</td>--}}
{{--                        <td>{{ $appeal->tad }}</td>--}}
{{--                        <td>{{ $appeal->tadname }}</td>--}}
{{--                        <td>{{ $appeal->jins }}</td>--}}
{{--                        <td>{{ $appeal->tugilgan }}</td>--}}
{{--                        <td>{{ $appeal->maqom }}</td>--}}
{{--                        <td>{{ $appeal->files }}</td>--}}
{{--                        <td>{{ $appeal->xizmat }}</td>--}}
{{--                        <td>{{ $appeal->vitext }}</td>--}}
{{--                        <td>{{ $appeal->status }}</td>--}}
{{--                        <td>{{ $appeal->generated_code }}</td>--}}

{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
        </div>
        <div>
            {{ $appeals->links() }}
        </div>
    </div>
@endsection
