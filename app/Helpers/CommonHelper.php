<?php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\SystemSetting;

class CommonHelper {
    /**
     * @param string [] $row
     *
     * @return string []
     */
    public static function getConfigValue($key) {
        $data = SystemSetting::where('code', $key)->get();
        $value = "";
        foreach ($data as $row) {
            $value = $row->value;
        }
        return $value;
    }
}
?>
