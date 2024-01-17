<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEstateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'area' => 'numeric',
            'floor' => 'integer',
            'parking' => 'boolean',
            'WC' => 'boolean',
            'room' => 'boolean',
            'elevator' => 'boolean',
            'storehouse' => 'boolean',
            'totalPrice' => 'numeric',
            'mortgage' => 'numeric',
            'rent' => 'numeric',
            'category_id' => 'integer|exists:categories,id',
            'city_id' => 'integer|exists:cities,id',
            'type' =>  'string|max:255',
        ];
    }
}
