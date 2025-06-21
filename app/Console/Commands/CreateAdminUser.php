<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin-user {name?} {email?} {password?} {phone?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name') ?? $this->ask('Enter user name');
        $email = $this->argument('email') ?? $this->ask('Enter user email');
        $password = $this->argument('password') ?? $this->secret('Enter user password');
        $passwordConfirmation = $this->argument('password') ?? $this->secret('Confirm user password');
        $phone = $this->argument('phone') ?? $this->ask('Enter user phone number');

        // Check password confirmation
        if ($password !== $passwordConfirmation) {
            $this->error('Passwords do not match!');
            return Command::FAILURE;
        }

        // Validate input
        $validator = Validator::make(
            [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'phone' => $phone,
            ],
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'password' => ['required', 'string', 'min:8'],
                'phone' => ['required', 'string', 'max:20'], // Adjust length as needed
            ]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return Command::FAILURE;
        }

        // Create the user
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'phone' => $phone,
            'email_verified_at' => now(),
        ]);

        // Assign the 'admin' role
        $adminRole = Role::where('name', 'admin')->first();
        if (!$adminRole) {
            $this->error("The 'admin' role does not exist. Please run 'php artisan db:seed --class=RolesAndPermissionsSeeder' first.");
            $user->delete();
            return Command::FAILURE;
        }

        $user->assignRole('admin');

        $this->info("Admin user '{$user->email}' created successfully!");
        return Command::SUCCESS;
    }
}
