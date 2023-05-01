<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Admin;
use App\Models\Owner;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        if($input['role'] == 'admin'){
        $validator = Validator::make($input, [
            'first_name' => ['required', 'string', 'max:40'],
            'last_name' => ['required', 'string', 'max:40'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255'
            ],
            'password' => $this->passwordRules(),
            '
            ' => ['required', 'string', 'min:8'],
        ]);

        $validator->validate();


        $user = new User;
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->save();

        $admin = new Admin;
        $admin->first_name = $input['first_name'];
        $admin->last_name = $input['last_name'];
        $admin->user_id = $user->id;
        $admin->save();
        
    }elseif($input['role'] == 'owner'){
        $validator = Validator::make($input, [
            'first_name' => ['required', 'string', 'max:40'],
            'last_name' => ['required', 'string', 'max:40'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255'
            ],
            'phone' => ['required', 'numeric', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'password' => $this->passwordRules(),
            'password_confirmation' => ['required', 'string', 'min:8'],
        ]);

        $validator->validate();

        $user = new User;
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->save();

        $owner = new Owner;
        $owner->first_name = $input['first_name'];
        $owner->last_name = $input['last_name'];
        $owner->handphone = $input['phone'];
        $owner->user_id = $user->id;
        $owner->save();

    }elseif($input['role'] == 'customer'){
        $validator = Validator::make($input, [
            'first_name' => ['required', 'string', 'max:40'],
            'last_name' => ['required', 'string', 'max:40'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255'
            ],
            'phone' => ['required', 'numeric', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'password' => $this->passwordRules(),
            'password_confirmation' => ['required', 'string', 'min:8'],
        ]);

        $validator->validate();

        $user = new User;
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->save();

        $customer = new Customer;
        $customer->handphone = $input['phone'];
        $customer->first_name = $input['first_name'];
        $customer->last_name = $input['last_name'];
        $customer->user_id = $user->id;
        $customer->save();
    }

    return $user;

    }
}