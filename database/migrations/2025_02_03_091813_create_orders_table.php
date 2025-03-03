<?php

    use App\Models\PaymentMethod;
    use App\Models\User;
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
                $table->string('payment_method');
                $table->string('invoice_number')->nullable();
                $table->decimal('total_price', 15, 2);
                $table->decimal('shipping_price', 15, 2)->default(0);
                $table->enum('status', ['PENDING', 'SUCCESS', 'FAILED', 'CANCELLED']);
                $table->json('shipping_address');
                $table->json('billing_address');
                $table->text('notes')->nullable();
                $table->string('payment_status')->nullable()->default('Unpaid');
                $table->string('payment_id')->nullable();
                $table->timestamp('paid_at')->nullable();
                $table->timestamp('canceled_at')->nullable();
                $table->timestamp('finished_at')->nullable();
                $table->timestamp('failed_at')->nullable();
                $table->timestamp('expired_at')->nullable();
                $table->timestamp('canceled_by_admin_at')->nullable();
                $table->timestamp('canceled_by_user_at')->nullable();
                $table->timestamp('confirmed_at')->nullable();
                $table->timestamp('delivered_at')->nullable();
                $table->timestamp('returned_at')->nullable();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('orders');
        }
    };
