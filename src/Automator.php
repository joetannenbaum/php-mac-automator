<?php

namespace Automator;

class Automator
{
    use KeyHelpers, ModifierHelpers;

    protected $commands = [];

    protected float $typingSpeed = 0.05;

    public static function make(): static
    {
        return new static();
    }

    public function open(string $app)
    {
        $app = addslashes($app);

        $this->commands[] = "Application('{$app}').activate();";

        return $this;
    }

    public function setTypingSpeed(float $speed): static
    {
        $this->typingSpeed = $speed;

        return $this;
    }

    public function pause(int|float $seconds): static
    {
        $this->commands[] = "delay($seconds);";

        return $this;
    }

    public function typeAndEnter(string|Key $text, Modifier|array $modifiers = null): static
    {
        return $this->type($text, $modifiers)->enter();
    }

    public function type(string|Key $text, Modifier|array $modifiers = null): static
    {
        if ($modifiers === null) {
            if ($text instanceof Key) {
                $text = $text->keyCode();
                $this->commands[] = "se.keyCode({$text});";
            } else {
                $text = addslashes($text);
                $this->commands[] = "type('$text');";
            }

            return $this;
        }

        if (!is_array($modifiers)) {
            $modifiers = [$modifiers];
        }

        $modifiers = array_map(fn ($modifier) => $modifier->forScript(), $modifiers);

        $keyCode = $text instanceof Key ? $text : Key::fromName($text);

        $this->commands[] = sprintf(
            'se.%s(%s, { using: %s });',
            $keyCode ? 'keyCode' : 'keystroke',
            $keyCode?->keyCode() ?? "'" . addslashes($text) . "'",
            json_encode($modifiers)
        );

        return $this;
    }

    public function repeat(int $times, callable $callback): static
    {
        for ($i = 0; $i < $times; $i++) {
            $callback($this);
        }

        return $this;
    }

    public function run(): void
    {
        $base = dirname(__DIR__, 1);

        $commands = implode(PHP_EOL, $this->commands);

        $path = tempnam(sys_get_temp_dir(), 'php-mac-automator');

        $scriptBase = file_get_contents($base . '/stubs/base.sh');

        $scriptBase = str_replace('{{typingSpeed}}', $this->typingSpeed, $scriptBase);

        file_put_contents($path, $scriptBase . PHP_EOL . $commands);

        exec("chmod +x $path");
        exec("$path");

        unlink($path);
    }
}
