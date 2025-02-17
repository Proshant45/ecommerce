<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('addresses', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(\App\Models\User::class)->constrained()->cascadeOnDelete();
                $table->string('address_type')->default('billing');
                $table->string('first_name')->nullable();
                $table->string('last_name')->nullable();
                $table->string('phone');
                $table->string('email');
                $table->string('address');
                $table->string('city');
                $table->string('zip');
                $table->string('country');


                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('addresses');
        }
    };
