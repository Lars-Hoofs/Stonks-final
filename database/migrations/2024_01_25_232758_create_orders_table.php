<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pizza_id');
            $table->integer('quantity')->default(1);
            $table->decimal('total_price', 8, 2)->default(0);
            $table->string('status')->default('pending');
            $table->timestamps();
        });

        $cartsData = DB::table('carts')->get();

        foreach ($cartsData as $cartItem) {
            DB::table('orders')->insert([
                'user_id' => $cartItem->user_id,
                'pizza_id' => $cartItem->pizza_id,
                'quantity' => $cartItem->quantity,
                'total_price' => $cartItem->total_price,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};