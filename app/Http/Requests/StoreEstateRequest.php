<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstateRequest extends FormRequest
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
            'area' => 'required|numeric',
            'floor' => 'required|integer',
            'parking' => 'required|boolean',
            'WC' => 'required|boolean',
            'room' => 'required|boolean',
            'elevator' => 'required|boolean',
            'storehouse' => 'required|boolean',
            'totalPrice' => 'required|numeric',
            'mortgage' => 'required|numeric',
            'rent' => 'required|numeric',
            'category_id' => 'integer|exists:categories,id',
            'city_id' => 'integer|exists:cities,id',
            'type' => 'required', 'string', 'max:255',
        ];
    }
}
