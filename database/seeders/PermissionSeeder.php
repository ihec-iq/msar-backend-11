<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        //region System Permissions
        Permission::create(['name' => 'Administrator']);
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'add user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'show users']);

        Permission::create(['name' => 'add archive']);
        Permission::create(['name' => 'edit archive']);
        Permission::create(['name' => 'delete archive']);
        Permission::create(['name' => 'show archives']);

        Permission::create(['name' => 'add document']);
        Permission::create(['name' => 'delete document']);
        Permission::create(['name' => 'show documents']);

        Permission::create(['name' => 'add section']);
        Permission::create(['name' => 'add user sections']);
        Permission::create(['name' => 'edit section']);
        Permission::create(['name' => 'delete section']);
        Permission::create(['name' => 'show sections']);

        Permission::create(['name' => 'add archiveType']);
        Permission::create(['name' => 'edit archiveType']);
        Permission::create(['name' => 'delete archiveType']);
        Permission::create(['name' => 'show archiveTypes']);

        Permission::create(['name' => 'add inputVoucher']);
        Permission::create(['name' => 'edit inputVoucher']);
        Permission::create(['name' => 'delete inputVoucher']);
        Permission::create(['name' => 'show inputVouchers']);

        Permission::create(['name' => 'show storage']);

        Permission::create(['name' => 'add outputVoucher']);
        Permission::create(['name' => 'edit outputVoucher']);
        Permission::create(['name' => 'delete outputVoucher']);
        Permission::create(['name' => 'show outputVouchers']);

        Permission::create(['name' => 'add directVoucher']);
        Permission::create(['name' => 'edit directVoucher']);
        Permission::create(['name' => 'delete directVoucher']);
        Permission::create(['name' => 'show directVouchers']);

        Permission::create(['name' => 'add retrievalVoucher']);
        Permission::create(['name' => 'edit retrievalVoucher']);
        Permission::create(['name' => 'delete retrievalVoucher']);
        Permission::create(['name' => 'show retrievalVouchers']);

        Permission::create(['name' => 'add item']);
        Permission::create(['name' => 'edit item']);
        Permission::create(['name' => 'delete item']);
        Permission::create(['name' => 'show items']);

        Permission::create(['name' => 'add category item']);
        Permission::create(['name' => 'edit category item']);
        Permission::create(['name' => 'delete category item']);
        Permission::create(['name' => 'show categories item']);

        Permission::create(['name' => 'vacation office']);
        Permission::create(['name' => 'vacation center']);
        Permission::create(['name' => 'vacation Report']);

        Permission::create(['name' => 'add vacation time']);
        Permission::create(['name' => 'edit vacation time']);
        Permission::create(['name' => 'delete vacation time']);
        Permission::create(['name' => 'show vacations time']);

        Permission::create(['name' => 'add vacation daily']);
        Permission::create(['name' => 'edit vacation daily']);
        Permission::create(['name' => 'delete vacation daily']);
        Permission::create(['name' => 'show vacations daily']);

        Permission::create(['name' => 'add vacation sick']);
        Permission::create(['name' => 'edit vacation sick']);
        Permission::create(['name' => 'delete vacation sick']);
        Permission::create(['name' => 'show vacations sick']);

        Permission::create(['name' => 'add employee']);
        Permission::create(['name' => 'edit employee']);
        Permission::create(['name' => 'delete employee']);
        Permission::create(['name' => 'show employees']);

        Permission::create(['name' => 'add bonus']);
        Permission::create(['name' => 'edit bonus']);
        Permission::create(['name' => 'delete bonus']);
        Permission::create(['name' => 'show bonuses']);

        Permission::create(['name' => 'add promotion']);
        Permission::create(['name' => 'edit promotion']);
        Permission::create(['name' => 'delete promotion']);
        Permission::create(['name' => 'show promotions']);

        Permission::create(['name' => 'add user hr']);
        Permission::create(['name' => 'edit user hr']);
        Permission::create(['name' => 'delete user hr']);
        Permission::create(['name' => 'show user hrs']);
        // Special permission
        Permission::create(['name' => 'has section only']);



        //endregion
        Permission::create(['name' => 'add warehouse setting']);
        Permission::create(['name' => 'edit warehouse setting']);
        Permission::create(['name' => 'delete warehouse setting']);
        Permission::create(['name' => 'show warehouse settings']);

        Permission::create(['name' => 'add employee setting']);
        Permission::create(['name' => 'edit employee setting']);
        Permission::create(['name' => 'delete employee setting']);
        Permission::create(['name' => 'show employee setting']);

    }
}
