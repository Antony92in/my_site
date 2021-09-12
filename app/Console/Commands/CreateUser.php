<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

/**
 * Class CreateUser
 * @package App\Console\Commands
 */
class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user {name} {email} {password} {admin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user in database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $user = new User();
            $user->name = $this->argument('name');
            $user->email = $this->argument('email');
            $user->password = Hash::make($this->argument('password'));
            $user->created_at = time();
            $user->admin = $this->argument('admin');
            $user->save();

            $this->info("User {$this->argument('name')} successfully created");
        } catch (QueryException $e) {

            Log::error($e->getMessage());
            $this->error("Cannot create user! Error!");
        }
    }
}
