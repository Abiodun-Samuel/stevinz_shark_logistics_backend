<?php

namespace App\Http\Requests\Api;

use App\Enums\Api\PaymentMode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class InventoryRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'shipment_number' => ['required', 'string', 'max:255'],
            'gen_code' => ['required', 'string', 'max:255'],
            'item' => ['required', 'string'],
            'location_id' => ['required', 'integer', 'max:255'],
            'sender_name' => ['nullable', 'string'],
            'sender_phone' => ['required', 'string'],
            'receiver_name' => ['nullable', 'string'],
            'receiver_phone' => ['required', 'string'],
            'volume' => ['nullable', 'string', 'max:255'],
            'amount' => ['required', 'integer'],
            'branch' => ['required', 'string', 'max:255'],
            'payment_mode' => ['required', new Enum(PaymentMode::class)],
        ];
    }
}
