<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class DeleteCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return (auth()->user()->id == $this->company->users()->first()->id  &&  auth()->user()->company_id == $this->company->id);

    }

    public function rules()
    {   
        return [
            //
        ];
    }
}
