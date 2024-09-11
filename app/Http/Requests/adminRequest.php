<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;
use Str;

class adminRequest extends FormRequest
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
             'fullname'=>'required',
             'email'=>'required|email',
             'city'=>'required',
             'password'=>'required|min:5',
             'age'=>'required|between:18,60|numeric',
        ];
    }

    // public function messages(){
    //     return [
    //         "fullname.required"=>'Name is Required',
    //        "email.email"=>"Enter the correct Email Address",
    //         "email.required"=>'Email Address is Required',
    //         "city.required"=>'City field is Required',
    //         "password.required"=>'Password is Manitary',
    //         "age.required"=>'Age field is Required',
    //     ];
    // }

    public function attributes(){
        return [
            'fullname'=>'Full Name',
             'email'=>'Email Address',
             'city'=>'City',
             'password'=>'Password',
             'age'=>'Age',
        ];
    }
 
    //  protected function prepareForValidation(): void {
    //    $this->merge([
    //            'fullname'=> Str::slug($this->fullname)
    //    ]);
    //  }

     //protected $stopOnFirstFailure = true;
   
}
