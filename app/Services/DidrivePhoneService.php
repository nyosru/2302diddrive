<?php

namespace App\Services;

class DidrivePhoneService
{

    public function phone_number_format(string $sPhone): string
    {

        $sPhone = preg_replace("[^0-9]", '', $sPhone);

        if (strlen($sPhone) != 11)
            return 'False';

        $n1 = substr($sPhone, 0, 1);
        $nn1 = ((strlen($sPhone) == 11 && ($n1 == 7 || $n1 == 8)) ? 8 : '+' . $n1);

        return
            $nn1.
            '(' . substr($sPhone, 1, 3) . ')' .
            substr($sPhone, 4, 3) . '-' .
            substr($sPhone, 7, 2) . '-' .
            substr($sPhone, 7, 2);
    }

}
