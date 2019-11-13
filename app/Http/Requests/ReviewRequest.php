<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;

use Illuminate\Http\Exceptions\HttpResponseException;


class ReviewRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:70',
            'text' => 'required|string|max:1000',
        ];
    }
    
    public function messages()
    {
        return [
            'title.required' => 'Обязательно должно быть заполнено поле загововка отзыва!',
            'title.max' => 'Длина строкового поля загововка отзыва не должна превышать 20 символов!',
            'text.required' => 'Обязательно должен присутствовать текст отзыва!',
            'title.max' => 'Длина текста отзыва не должна превышать 1000 символов!',
        ];
    }
    
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            new JsonResponse($validator->messages(), 422)
        );
    }
}
