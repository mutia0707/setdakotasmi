<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class LockService
{
    const TIMEOUT_MINUTES = 10; // lock otomatis lepas kalau lebih dari 10 menit nggak ada aktivitas

    public static function checkLock(string $table, int $recordId)
    {
        $lock = DB::table('edit_locks')
            ->where('table_name', $table)
            ->where('record_id', $recordId)
            ->where('locked_at', '>=', now()->subMinutes(self::TIMEOUT_MINUTES))
            ->first();

        if ($lock && $lock->locked_by != auth()->id()) {
            $user = DB::table('users')->find($lock->locked_by);
            return [
                'locked' => true,
                'by'     => $user->name ?? 'user lain',
                'since'  => \Carbon\Carbon::parse($lock->locked_at)->diffForHumans(),
            ];
        }
        return ['locked' => false];
    }

    public static function acquireLock(string $table, int $recordId)
    {
        DB::table('edit_locks')->updateOrInsert(
            ['table_name' => $table, 'record_id' => $recordId],
            ['locked_by' => auth()->id(), 'locked_at' => now(), 'updated_at' => now()]
        );
    }

    public static function releaseLock(string $table, int $recordId)
    {
        DB::table('edit_locks')
            ->where('table_name', $table)
            ->where('record_id', $recordId)
            ->delete();
    }
}