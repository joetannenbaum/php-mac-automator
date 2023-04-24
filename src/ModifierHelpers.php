<?php

namespace Automator;

trait ModifierHelpers
{
    public function typeWithCommand(string|Key $text): static
    {
        return $this->type($text, Modifier::COMMAND);
    }

    public function typeWithControl(string|Key $text): static
    {
        return $this->type($text, Modifier::CONTROL);
    }

    public function typeWithShift(string|Key $text): static
    {
        return $this->type($text, Modifier::SHIFT);
    }

    public function typeWithOption(string|Key $text): static
    {
        return $this->type($text, Modifier::OPTION);
    }
}
