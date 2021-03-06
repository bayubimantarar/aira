<?php

namespace App\Rules;

use App\Pelanggan;
use Illuminate\Contracts\Validation\Rule;

class CheckNIK implements Rule
{

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pelanggan = Pelanggan::where('nik', $value)
            ->exists();

        if(empty($pelanggan)){
            return true;  
        }else{
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'NIK sudah ada!';
    }
}
