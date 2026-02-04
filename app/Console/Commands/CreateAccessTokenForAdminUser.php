<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAccessTokenForAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-token {id=admin : идентификатор пользователя}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates access token for employee by id';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = $this->argument('id') === 'admin' ? User::where('name', 'admin')->first() : User::find($this->argument('id'));
        $token = $user->createToken($this->argument('id'));

        $this->info('Ваш токен: '.$token->plainTextToken);
    }
}
