<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
	 
	 	Schema::create('table_in_database2', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('foreign_column')->nullable(); // Assuming it's a nullable foreign key
			$table->foreign('foreign_column')->references('id')->on('database1.table_in_database1');
			//                                              ^^^^ Specify the database name here
			$table->timestamps();
		});
	    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->string('email')->unique();
			$table->unsignedBigInteger('hospital_id')->nullable();
			
			$table->foreign('hospital_id')->references('id')->on('hospital.hostpitals');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

		
    }
	 
     */

	public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id')->nullable();
			$table->string('name');
			$table->string('email')->unique();
            // Other columns and constraints
            $table->timestamps();
            
            $table->foreign('hospital_id')->references('id')->on('hospital.hostpitals');
            //                                  ^^^^ Specify the database name here
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
