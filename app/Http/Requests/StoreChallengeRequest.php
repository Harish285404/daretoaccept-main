<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class StoreChallengeRequest extends FormRequest
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
                'start_date' => 'required|date', // Only date
                'start_time' => 'required|date_format:H:i', // Only time in 24-hour format
                'total_participants' => 'nullable|integer',
                'amount' => 'nullable|string',
                // 'charity_id' => 'nullable|integer',
                'social_links' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'rules' => 'nullable|string',
                'encouragement' => 'nullable|string',
                'photo' => 'nullable|file|mimes:jpg,png|max:10240',
                'video' => 'nullable|file|mimes:mp4,avi|max:20480',
            ];
        }

    
}
