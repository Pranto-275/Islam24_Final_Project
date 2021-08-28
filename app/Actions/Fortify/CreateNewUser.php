<?php

namespace App\Actions\Fortify;

use App\Models\Backend\ContactInfo\Contact;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                // 'email' => $input['email'],
                'address' => $input['address'],
                'mobile' => $input['mobile'],
                'type' => 'Customer',
                'password' => Hash::make($input['password']),
            ]), function (User $user) {
                $this->createTeam($user);
                $user->assignRole('customer');
                $contact = Contact::whereUserId($user->id)->firstOrNew();
                $contact->first_name = $user->name;
                $contact->user_id = $user->id;
                // $contact->branch_id = 1;
                $contact->created_by = $user->id;
                $contact->save();
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
