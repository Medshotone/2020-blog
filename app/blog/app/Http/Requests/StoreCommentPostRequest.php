<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentPostRequest extends FormRequest
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
            'content'     => 'required',
            'category_id' => 'required|integer',
            'author'      => [
                function ($attribute, $value, $fail) {
                    $tmp_value = explode(' ', $value);

                    if (count($tmp_value) != 2) {
                        return $fail('Имя должно содержать два слова, оба с большой буквы');
                    }

                    if (mb_strtolower(mb_substr($tmp_value[0], 0, 1), 'utf-8') == mb_substr($tmp_value[0], 0, 1)) {
                        return $fail('Имя должно содержать два слова, оба с большой буквы');
                    }
                    if (mb_strtolower(mb_substr($tmp_value[1], 0, 1), 'utf-8') == mb_substr($tmp_value[1], 0, 1)) {
                        return $fail('Имя должно содержать два слова, оба с большой буквы');
                    }
                }
            ]
        ];
    }
}
