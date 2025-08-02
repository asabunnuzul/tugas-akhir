<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            $titleCaseName = Str::title(Str::lower($user->name)); // lowercase first to normalize
            if ($user->name !== $titleCaseName) {
                $user->name = $titleCaseName;
                $user->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
