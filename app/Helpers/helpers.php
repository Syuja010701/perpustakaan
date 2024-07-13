<?php

namespace App\Helpers;

use App\Models\Konfigurasi;
use App\Models\Notification;

class NotifyClass
{

    function logo()
    {

        dd('tes');
        return Konfigurasi::value('logo_perpus');
    }
}
