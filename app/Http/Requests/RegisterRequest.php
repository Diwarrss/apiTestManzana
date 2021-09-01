<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
         'name' => 'required',
         'last_name' => 'required',
         'email' => 'required|email|unique:users',
         'password' => 'required'
      ];
   }

   /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
   public function messages()
   {
      return [
         'name.required' => 'El nombre es obligatorio',
         'last_name.required' => 'El apellido es obligatorio',
         'email.required' => 'El e-mail es obligatorio',
         'email.unique' => 'El e-mail ya existe',
         'password.required' => 'La contraseña es obligatoria',
      ];
   }
}
