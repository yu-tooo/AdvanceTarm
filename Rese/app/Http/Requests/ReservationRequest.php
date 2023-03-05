<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'date' => 'date|required|after:today',
            'time' => 'required',
            'number' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'date.date' => '来店する日付を入力してください',
            'date.required' => '来店する日付を入力してください',
            'date.after' => '今日以降の日付を入力してください',
            'time.required' => '来店する時間を入力してください',
            'number.required' => '来店人数を入力してください'
        ];
    }
}
