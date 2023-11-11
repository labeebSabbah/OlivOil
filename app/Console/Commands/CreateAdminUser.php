<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;

use App\Models\User;
use App\Models\Directorate;

class CreateAdminUser extends Command implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin {username} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates an admin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Creating admin user...");
        sleep(1);
        $this->info("Username: {$this->argument('username')}");
        sleep(1);
        $this->info("Password: {$this->argument('password')}");
        $this->createAdminUser($this->argument('username'), $this->argument('password'));
        sleep(2);
        $this->info("Admin user created!");
    }

    protected function createAdminUser($username, $password)
    {
        $user = User::create([
            'username' => $username,
            'password' => bcrypt($password),
        ]);

        return;
    }

    /**
     * Prompt for missing arguments (name and password).
     *
     * @return array
     */
    protected function getMissingArguments()
    {
        $arguments = [];

        if (! $this->argument('username')) {
            $arguments['username'] = $this->ask('What is the username of the admin user?');
        }

        if (! $this->argument('password')) {
            $arguments['password'] = $this->secret('What is the password of the admin user?');
        }

        return $arguments;
    }
}
