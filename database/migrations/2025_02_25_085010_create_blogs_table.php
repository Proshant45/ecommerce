<?php

    use App\Models\Category;
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
            Schema::create('blogs', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(User::class);
                $table->string('image')->nullable();
                $table->string('title');
                $table->string('slug');
                $table->longText('body');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('blogs');
        }
    };
