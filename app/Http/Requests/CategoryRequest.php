<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            //
             'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'unique:categories,name,$id',
                // function ($attribute, $value, $fails) {
                //     if ($value == "admin") {
                //         $fails('this name for me pro');
                //     }
                // },
                // new Filter(['laravel', 'admin']),
                'filter:laravel,admin',
                // for use it I should add it in AppServiceProvider.php in boot function
                // Validator::extend ('filter',function ($attribute, $value,$params) {
                //     return in_array(strtolower($value) , $params)
                // },the message);
            ],

            'parent_id' => 'nullable|int|exists:categories,id',
            'image' => [
                'image',
                'max:1048576',
                'dimensions:min_width=100,min_height=100',
            ],

            "status" => 'required|in:active,archived',
        ];
    }
}
