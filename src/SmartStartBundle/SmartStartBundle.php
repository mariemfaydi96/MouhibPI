<?php

namespace SmartStartBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SmartStartBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
