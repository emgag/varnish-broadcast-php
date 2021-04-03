<?php

namespace Emgag\VarnishTowncrier\Request;

interface RequestInterface
{
    public function isValid(): bool;

    public function __toString(): string;
}
