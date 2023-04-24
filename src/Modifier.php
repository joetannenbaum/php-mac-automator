<?php

namespace Automator;

enum Modifier: string
{
    case SHIFT = 'shift';
    case ALT = 'alt';
    case COMMAND = 'command';
    case CONTROL = 'control';
    case OPTION = 'option';
    case FUNCTION = 'function';

    public function forScript(): string
    {
        return $this->value . ' down';
    }
}
