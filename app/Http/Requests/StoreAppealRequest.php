<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppealRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fio' => 'required|string|max:255',
            'hudud' => 'required|integer',
            'tuman' => 'required|integer',
            'manzil' => 'required|string|max:255',
            'email' => 'required|email',
            'tel' => 'required|phone',
            'tad' => 'required|integer',
            'tadname' => 'nullable|required_if:tad,==,2|string|max:255',
            'jins' => 'required|integer|between:0,3',
            'tugilgan' => 'required|integer|max:2006',
            'maqom' => 'required|integer|between:0,5',
            'files' => 'file|max:3072|mimes:jpg,zip,rar,pdf',
            'xizmat' => 'required|integer|between:0,5',
            'vitext' => 'required|string|min:10|max:1000',
            'captcha' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'fio.required' => 'F.I.O. bo\'sh bo\'lmasligi kerak!',
            'fio.max' => '255 belgidan ko\'p!',
            'hudud.required' => 'Hududni tanlang!',
            'hudud.max' => 'Xatolik!',
            'tuman.required' => 'Tumanni tanlang!',
            'tuman.max' => 'Xatolik!',
            'manzil.required' => 'Manzilni kiriting!',
            'manzil.max' => '255 belgidan ko\'p!',
            'email.required' => 'Emailni kiriting!',
            'email.email' => 'Emailda xatolik!',
            'tel.required' => 'Telefon raqamingizni kiriting!',
            'tel.phone' => 'Raqamingizni to\'liq kiriting!',
            'tad.required' => 'Berilgan variantdan birini tanlang!',
            'tad.integer' => 'Xatolik!',
            'tadname.max' => '255 belgidan ko\'p!',
            'tadname.required_if' => 'Tadbirkor bo\'lsangiz bu qatorni ham to\'ldiring!',
            'jins.required' => 'Berilgan variantdan birini tanlang!',
            'jins.integer' => 'Xatolik!',
            'jins.between' => 'Xatolik!',
            'tugilgan.required' => 'Berilgan variantdan birini tanlang!',
            'tugilgan.integer' => 'Xatolik!',
            'tugilgan.max' => 'Xatolik!',
            'maqom.required' => 'Berilgan variantdan birini tanlang!',
            'maqom.integer' => 'Xatolik!',
            'maqom.between' => 'Xatolik!',
            'files.file' => 'Xatolik!',
            'files.max' => 'Faylning maksimum hajmi: 3MB!',
            'files.mimes' => 'Ruxsat berilgan fayllar: jpg,zip,rar,pdf!',
            'xizmat.required' => 'Berilgan variantdan birini tanlang!',
            'xizmat.integer' => 'Xatolik!',
            'xizmat.between' => 'Xatolik!',
            'vitext.required' => 'Maydon majburiy!',
            'vitext.min' => 'Kamida 10 ta belgi kiriting!',
            'vitext.max' => 'Belgilar soni 1000 tadan ko\'p!',
            'captcha.required' => 'Rasmdagi belgilarni kiriting!',
            'captcha.captcha' => 'Noto\'g\'ri kiritildi!',
        ];
    }
}
