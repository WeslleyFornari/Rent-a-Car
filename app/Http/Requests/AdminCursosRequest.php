<?php

namespace RW940cms\Http\Requests;

use RW940cms\Http\Requests\Request;

class AdminCursosRequest extends Request
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
            'status_curso'=>'required',
            'categoria_curso'=>'required',
            'nome_curso'=>'required|min:3',
            'valor_curso'=>'required|min:3',
            'contrato_curso'=>'required|min:3',
        ];
    }
}
