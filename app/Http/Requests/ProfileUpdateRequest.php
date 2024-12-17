<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
public function authorize()
{
return true;
}

public function rules()
{
return [
'name' => 'required|string|max:255',
'email' => 'required|email|max:255|unique:users,email,' . $this->user()->id,
'phone' => 'nullable|string|max:20',
'bio' => 'nullable|string',
'address' => 'nullable|string|max:255',
'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
];
}
}