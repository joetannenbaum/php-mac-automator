<?php

namespace Automator;

trait KeyHelpers
{
    public function enter(Modifier|array $modifiers = null): static
    {
        return $this->type(Key::RETURN, $modifiers);
    }

    public function downArrow(Modifier|array $modifiers = null): static
    {
        return $this->type(Key::ARROW_DOWN, $modifiers);
    }

    public function upArrow(Modifier|array $modifiers = null): static
    {
        return $this->type(Key::ARROW_UP, $modifiers);
    }

    public function leftArrow(Modifier|array $modifiers = null): static
    {
        return $this->type(Key::ARROW_LEFT, $modifiers);
    }

    public function rightArrow(Modifier|array $modifiers = null): static
    {
        return $this->type(Key::ARROW_RIGHT, $modifiers);
    }

    public function tab(Modifier|array $modifiers = null): static
    {
        return $this->type(Key::TAB, $modifiers);
    }

    public function space(Modifier|array $modifiers = null): static
    {
        return $this->type(Key::SPACE, $modifiers);
    }

    public function delete(Modifier|array $modifiers = null): static
    {
        return $this->type(Key::DELETE, $modifiers);
    }

    public function backspace(Modifier|array $modifiers = null): static
    {
        return $this->type(Key::BACKSPACE, $modifiers);
    }

    public function escape(Modifier|array $modifiers = null): static
    {
        return $this->type(Key::ESCAPE, $modifiers);
    }

    public function home(Modifier|array $modifiers = null): static
    {
        return $this->type(Key::HOME, $modifiers);
    }

    public function end(Modifier|array $modifiers = null): static
    {
        return $this->type(Key::END, $modifiers);
    }

    public function pageUp(Modifier|array $modifiers = null): static
    {
        return $this->type(Key::PAGE_UP, $modifiers);
    }

    public function pageDown(Modifier|array $modifiers = null): static
    {
        return $this->type(Key::PAGE_DOWN, $modifiers);
    }
}
