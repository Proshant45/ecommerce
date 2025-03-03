<?php

    use App\Models\Order;
    use App\Models\Product;
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('order_items', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(Order::class)->constrained()->cascadeOnDelete();
                $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
                $table->integer('quantity');
                $table->decimal('price', 15, 2);
                $table->decimal('total_price', 15, 2);
                $table->string('product_name');
                $table->string('discount')->nullable();
                $table->string('product_image')->nullable();
                $table->timestamps();

            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('order_items');
        }
    };
