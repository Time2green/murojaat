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
                            <input type="text" class="form-control" id="fio" name="fio" placeholder="">
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="hudud" class="form-label">Hudud</label>
                                <select class="form-select" id="hudud" name="hudud">
                                    <option value="">Hududni tanlang</option>
                                    <option value="1">Andijon viloyati</option>
                                    <option value="2">Buxoro viloyati</option>
                                    <option value="3">Jizzax viloyati</option>
                                    <option value="4">Qashqadaryo viloyati</option>
                                    <option value="5">Navoiy viloyati</option>
                                    <option value="6">Namangan viloyati</option>
                                    <option value="7">Samarqand viloyati</option>
                                    <option value="8">Surxondaryo viloyati</option>
                                    <option value="9">Sirdaryo viloyati</option>
                                    <option value="10">Toshkent viloyati</option>
                                    <option value="11">Farg'ona viloyati</option>
                                    <option value="12">Xorazm viloyati</option>
                                    <option value="13">Qoraqalpog'iston Respublikasi</option>
                                    <option value="14">Toshkent Shahri</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="tuman" class="form-label">Tuman (shahar)ni tanlang</label>
                                <select class="form-select" aria-label="Tuman (shahar)ni tanlang" id="tuman" name="tuman" disabled>
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select></div>
                        </div>
                        <div class="mb-3">
                            <label for="manzil" class="form-label">Manzil</label>
                            <input type="text" class="form-control" id="manzil" name="manzil">
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="email " class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                            </div>
                            <div class="col-6">
                                <label for="tel " class="form-label">Telefon</label>
                                <input type="text" class="form-control" id="tel" name="tel" placeholder="+998XX-XXX XXXX">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="tad" class="form-label">Tadbirkor
                                    <i class="fa-solid fa-circle-info" data-bs-toggle="tooltip" data-bs-placement="right" title="Tadbirkorlik sub'yekti sifatida murojaat qilmoqchimisiz?"></i>
                                </label>
                                <select class="form-select" aria-label="Tadbirkor" id="tad" name="tad">
                                    <option value="1">Yo'q</option>
                                    <option value="2">Ha</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="tadname " class="form-label">Tadbirkorlik subyekti nomi:</label>
                                <input type="text" class="form-control" id="tadname" name="tadname" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="jins" class="form-label">Jins</label>
                                <select class="form-select" aria-label="Jins" id="jins" name="jins">
                                    <option value="1">Erkak</option>
                                    <option value="2">Ayol</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="tugilgan" class="form-label">Tug'ilgan yilingiz</label>
                                <select class="form-select" aria-label="Tug'ilgan yilingiz" id="tugilgan" name="tugilgan">
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="maqom" class="form-label">Maqom</label>
                                <select class="form-select" aria-label="Maqomni tanlang" id="maqom" name="maqom">
                                    <option value="1">Band ishlaydi</option>
                                    <option value="2">Ishsiz</option>
                                    <option value="3">Nafaqaxo'r</option>
                                    <option value="4">Talaba</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="files" class="form-label">Fayl (3 MBgacha, jpg, zip, rar, pdf)</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="files" name="files">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="xizmat" class="form-label">Interaktiv xizmat (murojaat) turini tanlang</label>
                            <select class="form-select" aria-label="Hududni tanlang" id="xizmat" name="xizmat">
                                <option value="1">Oddiy murojaat</option>
                                <option value="2">Mulk huquqini tasdiqlovchi sertifikat berish</option>
                                <option value="3">Mulk huquqini tasdiqlovchi davlat orderini berish</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="vitext" class="form-label">Murojaat matni</label>
                            <textarea class="form-control" id="vitext" name="vitext" rows="9"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-3">Rasmdagi belgilarni kiriting</div>
                            <div class="col-4"></div>
                            <div class="col-5">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="captcha" name="captcha">
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
                <form action="" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="checknum" class="col-form-label">Murojaat raqami:</label>
                            <input type="text" class="form-control" id="checknum" name="checknum">
                        </div>
                        <div class="mb-3">
                            <label for="checkpass" class="col-form-label">Murojaat paroli (Kalit so'z):</label>
                            <input type="text" class="form-control" id="checkpass" name="checkpass">
                        </div>
                        <div class="mb-3">Rasmdagi belgilarni kiriting</div>
                        <div class="row mb-3">
                           <div class="col-6"></div>
                           <div class="col-6">
                               <input type="text" class="form-control" id="captcha" name="captcha">
                           </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="checksubmit"  class="btn btn-primary">Tekshirish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
