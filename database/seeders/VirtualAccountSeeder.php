<?php

namespace Database\Seeders;

use App\Models\VirtualAccount;
use App\Models\Wallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VirtualAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wallet = Wallet::query()->where("customer_id", "ADE")->firstOrFail();

        $virtualAccounts = new VirtualAccount();
        $virtualAccounts->bank = "BCA";
        $virtualAccounts->va_number = "21314124214124";
        $virtualAccounts->wallet_id = $wallet->id;
        $virtualAccounts->save();
    }
}
