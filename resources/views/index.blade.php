@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header text-center fw-bold">
                    Quyidagi formani to'ldiring
                </div>
                <div class="card-body">
                    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="fio" class="form-label">F.I.O.</label>
                            <input type="text" class="form-control @error('fio') is-invalid @enderror" id="fio" name="fio" placeholder="" value="{{ old('fio') }}">
                            @error('fio')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="hudud" class="form-label">Hudud</label>
                                <select class="form-select @error('hudud') is-invalid @enderror" id="hudud" name="hudud">
                                    <option value="">Hududni tanlang</option>
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id }}" {{ old('hudud') == $region->id ? 'selected' : '' }}>{{ $region->region }}</option>
                                    @endforeach
                                </select>
                                @error('hudud')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="tuman" class="form-label">Tuman (shahar)ni tanlang</label>
                                <select class="form-select @error('tuman') is-invalid @enderror" aria-label="Tuman (shahar)ni tanlang" id="tuman" name="tuman" disabled>
                                </select>
                                @error('tuman')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="manzil" class="form-label">Manzil</label>
                            <input type="text" class="form-control @error('manzil') is-invalid @enderror" id="manzil" name="manzil" value="{{ old('manzil') }}">
                            @error('manzil')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="email " class="form-label">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="tel " class="form-label">Telefon</label>
                                <input type="text" class="form-control @error('tel') is-invalid @enderror" id="tel" name="tel" placeholder="+998XX-XXX XXXX" value="{{ old('tel') }}">
                                @error('tel')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="tad" class="form-label">Tadbirkor
                                    <i class="fa-solid fa-circle-info" data-bs-toggle="tooltip" data-bs-placement="right" title="Tadbirkorlik sub'yekti sifatida murojaat qilmoqchimisiz?"></i>
                                </label>
                                <select class="form-select @error('tad') is-invalid @enderror" aria-label="Tadbirkor" id="tad" name="tad">
                                    @foreach(\App\Models\Helper::tad() as $key => $val)
                                        <option value="{{ $key }}" {{ old('tad') == $key ? 'selected' : '' }}>{{ $val }}</option>
                                    @endforeach
                                </select>
                                @error('tad')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="tadname" class="form-label">Tadbirkorlik subyekti nomi:</label>
                                <input type="text" class="form-control @error('tadname') is-invalid @enderror" id="tadname" name="tadname" value="{{ old('tadname') }}" disabled>
                                @error('tadname')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="jins" class="form-label">Jins</label>
                                <select class="form-select @error('jins') is-invalid @enderror" aria-label="Jins" id="jins" name="jins">
                                    @foreach(\App\Models\Helper::jins() as $key => $val)
                                        <option value="{{ $key }}" {{ old('jins') == $key ? 'selected' : '' }}>{{ $val }}</option>
                                    @endforeach
                                </select>
                                @error('jins')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="tugilgan" class="form-label">Tug'ilgan yilingiz</label>
                                <select class="form-select @error('tugilgan') is-invalid @enderror" aria-label="Tug'ilgan yilingiz" id="tugilgan" name="tugilgan">
                                    @for($i = 2006; $i>1940; $i--)
                                        <option value="{{ $i }}" {{ old('tugilgan') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('tugilgan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="maqom" class="form-label">Maqom</label>
                                <select class="form-select @error('tugilgan') is-invalid @enderror" aria-label="Maqomni tanlang" id="maqom" name="maqom">
                                    @foreach(\App\Models\Helper::maqom() as $key => $val)
                                        <option value="{{ $key }}" {{ old('maqom') == $key ? 'selected' : '' }}>{{ $val }}</option>
                                    @endforeach
                                </select>
                                @error('maqom')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="files" class="form-label">Fayl (3 MBgacha, jpg, zip, rar, pdf)</label>
                                <div class="input-group">
                                    <input type="file" class="form-control @error('files') is-invalid @enderror" id="files" name="files" accept=".jpg, .zip, .rar, .pdf">
                                    @error('files')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="xizmat" class="form-label">Interaktiv xizmat (murojaat) turini tanlang</label>
                            <select class="form-select @error('files') is-invalid @enderror" aria-label="Hududni tanlang" id="xizmat" name="xizmat">
                                @foreach(\App\Models\Helper::xizmat() as $key => $val)
                                    <option value="{{ $key }}" {{ old('xizmat') == $key ? 'selected' : '' }}>{{ $val }}</option>
                                @endforeach
                            </select>
                            @error('xizmat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="vitext" class="form-label">Murojaat matni</label>
                            <textarea class="form-control @error('vitext') is-invalid @enderror" id="vitext" name="vitext" rows="9">{{ old('vitext') }}</textarea>
                            @error('vitext')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-3">Rasmdagi belgilarni kiriting</div>
                            <div class="col-4">
                                <div class="captcha">
                                    <span>{!! captcha_img() !!}</span>
                                    <button type="button" class="btn btn-sm btn-secondary" class="reload" id="reload">
                                        <i class="fa-solid fa-rotate-right"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="mb-3">
                                    <input type="text" class="form-control @error('captcha') is-invalid @enderror" id="captcha" name="captcha">
                                    @error('captcha')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-envelope"></i> Jo'natish</button>
                    </form>
                </div>
                <div class="card-footer">
                    Izoh: Murojaatingiz tezkor ravishda hal etilishini istasangiz, har bir masala bo'yicha alohida murojaat yo'llashingizni hamda mazkur murojaatni lo'nda, oddiy va ravon tilda bayon etishingizni so'raymiz!
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-success text-white border-0 text-center mb-3 mt-lg-0 mt-3">
                <h3 style="display: inline" class="p-2"><i class="fa-solid fa-headset pe-1"></i> Yagona raqam 1082</h3>
            </div>
            <div class="card text-center mb-3">
                <div class="card-header fw-bold">Murojaat maqomini tekshirish</div>
                <div class="card-body">
                    Murojaat yuborilganda olingan parol (kalit so'z)ni kiriting:
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkModal">Tekshirish</button>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Biz bilan bog'lanish
                </div>
                <div class="card-body d-flex flex-column">
                    <span><b>Ishonch telefoni:</b> (+998 71) 259-21-37</span>
                    <span><b>Kantselariya:</b> (+998 71) 259-20-54</span>
                    <span><b>Elektron pochta:</b> info@davaktiv.uz</span>
                    <br>
                    <span><b>Ish vaqti:</b> dushanba-juma, 9:00-18:00</span>
                    <span><b>Tushlik vaqti:</b> 13:00-14:00</span>
                    <span><b>Dam olish:</b> shanba, yakshanba, bayram kunlari</span>
                    <br>
                    <span><b>Manzil:</b> 100000, Toshkent sh., Amir Temur Shox ko'chasi, 6 Mo'ljal: Beeline ofisi, Markaziy bank</span>
                    <span><b>Avtobuslar:</b> 60, 67, 71, 85, 51, 1, 10, 38</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="checkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Murojaat maqomini tekshirish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="checkForm">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="checknum" class="col-form-label">Murojaat raqami:</label>
                            <input type="text" class="form-control @error('checknum') is-invalid @enderror" id="checknum" name="checknum" value="{{ old('checknum') }}">
                            @error('checknum')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="checkpass" class="col-form-label">Murojaat paroli (Kalit so'z):</label>
                            <input type="text" class="form-control @error('checkpass') is-invalid @enderror" id="checkpass" name="checkpass" value="{{ old('checkpass') }}">
                            @error('checkpass')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-end mb-2">Rasmdagi belgilarni kiriting</div>
                        <div class="row">
                            <div class="col-6">
                                <div class="captcha">
                                    <span>{!! captcha_img() !!}</span>
                                    <button type="button" class="btn btn-sm btn-secondary" class="reload_2" id="reload_2">
                                        <i class="fa-solid fa-rotate-right"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control @error('captcha_2') is-invalid @enderror" id="captcha_2" name="captcha_2">
                                    @error('captcha_2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div id="sts" class="text-center"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tekshirish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(session()->has('success'))
            <!-- Modal -->
            <div class="modal fade" id="successRes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="d-flex justify-content-center align-items-center py-3 bg-success text-white"style="font-size: 1.2rem">
                            <span class="modal-title">
                                <i class="fa-solid fa-thumbs-up"></i>
                                Murojaatingiz muvaffaqqiyatli ro'yxatga olindi!
                            </span>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    style="font-size: 0.8rem;position: absolute; right: 8px; top: 8px;">

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <div><h3 class="text-danger">!!! DIQQAT !!!</h3></div>
                                <div>MUROJAATINGIZNING HOLATINI QUYIDAGI <b>ID</b> va <b>KALIT SO'Z</b>LAR ORQALI TEKSHIRISHINGIZ MUMKIN. O'ZINGIZGA SAQLAB OLISHNI UNUTMANG!</div>
                            </div>
                            <span><b>ID: </b>{{ session()->get('id') }}</span><br>
                            <span><b>Kalit so'z: </b>{{ session()->get('kalit') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @php session()->forget('id') @endphp
        @php session()->forget('kalit') @endphp
    @endif
    <script>
        $(document).ready(function (){

            var sess = {{ session()->has('success') ? session()->has('success') : 2 }};

            @php session()->forget('success') @endphp

            if(sess === 1){
                $('#successRes').modal('show');
            }
            $('#reload').click(function () {
                $.ajax({
                    type: 'GET',
                    url: 'reload-captcha',
                    success: function (data) {
                        $(".captcha span").html(data.captcha);
                    }
                });
            });
            $('#reload_2').click(function () {
                $.ajax({
                    type: 'GET',
                    url: 'reload-captcha',
                    success: function (data) {
                        $(".captcha span").html(data.captcha);
                    }
                });
            });

            var tad = $('#tad').val();
            var hudud = $('#hudud').val();

            if(hudud != 0){
                $('#tuman').prop('disabled', false).html(sessionStorage.getItem("tuman"));
            }

            if(tad == 2){
                $('#tadname').prop('disabled', false);
            }

            var code = "+\\9\\98";
            $("#tel").inputmask({
                mask: code+"99 999-99-99",
            });
            $("#hudud").on('change', function () {

                var selectedValue = $(this).val();

                $.ajax({
                    url: "{{ route('getRegions') }}",
                    method: 'get',
                    data: {
                        hudud: selectedValue
                    },
                    success: (res) => {

                        sessionStorage.setItem("tuman", res);

                        $('#tuman').prop('disabled', false).html(res);

                        if(res === ""){
                            $('#tuman').prop('disabled', true);
                        }
                    }
                })
            });
            $("#checkForm").submit(function (event) {

                event.preventDefault();
                var form = document.getElementById('checkForm');
                var formData = new FormData(form);

                $.ajax({
                    url: "{{ route('check-status') }}",
                    method: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: (res) => {

                        $('#sts').html(res);

                    }
                })
            });
            $("#tad").on('change', function () {

                var selectedValue = $(this).val();

                $('#tadname').prop('disabled', false);

                if(selectedValue == 1){
                    $('#tadname').prop('disabled', true);
                }
            });
        });
    </script>
@endsection
