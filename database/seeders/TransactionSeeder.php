<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 'INV-1650044531',
                'user_id' => 2,
                'credit_id' => 1,
                'IDGameApp' => 'AX-019234',
                'comments' => 'Lorem Ipsum',
                'total' => 15000,
                'status' => 'paid'
            ],
            [
                'id' => 'INV-1650044532',
                'user_id' => 2,
                'credit_id' => 1,
                'IDGameApp' => 'AB-019234',
                'comments' => 'Lorem Ipsum',
                'total' => 15000,
                'status' => 'unpaid'
            ],
            [
                'id' => 'INV-1650044533',
                'user_id' => 2,
                'credit_id' => 2,
                'IDGameApp' => 'SD-019234',
                'comments' => 'Lorem Ipsum',
                'total' => 20500,
                'status' => 'paid'
            ]
        ];

        foreach($data as $row){
            Transaction::create([
                'id' => $row['id'],
                'user_id' => $row['user_id'],
                'credit_id' => $row['credit_id'],
                'order_date' => Carbon::now(),
                'IDGameApp' => $row['IDGameApp'],
                'comments' => $row['comments'],
                'total' => $row['total'],
                'status' => $row['status'],
            ]);
        }
    }
}
