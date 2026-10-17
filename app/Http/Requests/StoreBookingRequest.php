<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'name'       => ['required','string','max:120'],
            'email'      => ['required','email','max:150'],
            'whatsapp'   => ['required','regex:/^\+?[0-9\s\-()]{8,20}$/'],
            'city'       => ['required','string','max:100'],
            'role'       => ['required','string','max:100'],
            'grade'      => ['required','string','max:50'],
            'school'     => ['required','string','max:150'],
            'curriculum' => ['required','string','max:100'],
            'topics'     => ['required','array','min:1','max:10'],
            'topics.*'   => ['string','max:120'],
            'country'    => ['required','string','max:150'],
            'major'      => ['nullable','string','max:150'],
            'start_year' => ['required','array','min:1','max:6'],
            'start_year.*' => ['string','max:50'],
            'question'   => ['required','string','max:2000'],
            'mode'       => ['required', Rule::in(['Face to Face','Zoom meeting'])],
            'days'       => ['required','array','min:1','max:8'],
            'days.*'     => ['string','max:50'],
            'times'      => ['required','array','min:1','max:6'],
            'times.*'    => ['string','max:80'],
            'source'     => ['required','string','max:150'],
        ];
    }

    public function messages(): array
    {
        return ['whatsapp.regex' => 'Please enter a valid WhatsApp number.'];
    }
}