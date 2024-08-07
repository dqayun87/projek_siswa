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
        // Tambahkan ini untuk menghapus tabel jika sudah ada
            // Tambahkan ini untuk menghapus tabel jika sudah ada

        

            Schema::create('students', function (Blueprint $table) {
                $table->id();
                $table->text('img');
                $table->string('name');
                $table->string('gender');
                $table->unsignedBigInteger('classroom_id');
                $table->string('religion');
                $table->text('address');
                $table->timestamps();

                // Foreign key constraint
                $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            });
        }   

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('students');
            Schema::dropIfExists('classrooms');
        }
    };
