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
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->foreignId('category_id')
                    ->constrained()
                    ->cascadeOnDelete();
                $table->string('name');
                $table->string('image')->nullable();
                $table->integer('full_price');
                $table->integer('original_price');
                $table->string('short_description');
                $table->string('sku');
                $table->string('brand')->nullable();
                $table->text('long_description')->nullable();
                $table->string('weight')->nullable();
                $table->string('dimension')->nullable();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('products');
        }
    };
