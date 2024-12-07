<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateChallengeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'total_participants' => 'nullable|integer|min:0',
            'amount' => 'nullable|numeric|min:0',
            // 'charity_id' => 'nullable|integer|exists:charities,id',
            'description' => 'nullable|string|max:5000',
            'photo' => 'nullable|file|mimes:jpg,png|max:10240',
        ];
    }
}
