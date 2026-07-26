<?php

namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Authorization handled by middleware / gate for Super Admin
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'subdomain' => 'required|string|lowercase|alpha_dash|unique:companies,subdomain',
            'custom_domain' => 'nullable|string|unique:companies,custom_domain',
            'status' => 'required|in:active,trial,suspended',

            // Admin user fields
            'admin_name' => 'required|string|max:255',
            'admin_email' => 'required|email|unique:users,email',
            'admin_password' => 'required|string|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'subdomain.alpha_dash' => 'Subdomain may only contain letters, numbers, dashes and underscores.',
        ];
    }
}

