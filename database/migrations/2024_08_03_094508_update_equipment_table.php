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
        Schema::table('equipment', function (Blueprint $table) {
           

            // Add new column for stock unit description
            $table->string('stock_unit')->nullable()->after('restocking_point');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipment', function (Blueprint $table) {
            // Add back the stock_unit_id column
            $table->foreignId('stock_unit_id')->after('restocking_point')->constrained('stockunits')->onDelete('cascade');
            
            // Drop the new stock_unit column
            $table->dropColumn('stock_unit');
        });
    }
};
