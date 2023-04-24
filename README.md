# PHP Mac Automator

A simple wrapper around JXA scripts to allow you to control your Mac using PHP.

**👋 This is a work in progress and is not ready for production use.** That being said, it's pretty fun to play with. So please do so.

## Installation

```bash
composer require joetannenbaum/php-mac-automator
```

## Usage

```php
use Automator\Automator;

$automator = new Automator();

// Open Warp terminal and list the files in the current directory
$automator->open('Warp')->typeAndEnter('ls')->run();

// or
Automator::make()->open('Warp')->typeAndEnter('ls')->run();
```

## Opening Apps

```php
$automator->open('Warp');
```

## Typing

```php
$automator->type('Hello World');
$automator->typeAndEnter('Hello World');

// With modifier keys (e.g. zoom in)
$automator->withCommand('+');
$automator->withShift('+');
$automator->withOption('+');
$automator->withControl('+');

// With multiple modifier keys (e.g. re-open last tab)
$automator->type('t', [Modifier::COMMAND, Modifier::SHIFT]);

// Helpers
$automator->enter();
$automator->tab();
$automator->backspace();
$automator->delete();
$automator->escape();
$automator->space();
$automator->arrowUp();
$automator->arrowDown();
$automator->arrowLeft();
$automator->arrowRight();
$automator->home();
$automator->end();
$automator->pageUp();
$automator->pageDown();

// Add modifer(s) to helper
$automator->enter(Modifier::SHIFT);
$automator->enter([Modifier::COMMAND, Modifier::SHIFT]);

// Set the typing speed
// 0.1 seconds between each character (default is 0.05)
$automator->setTypingSpeed(0.1);
```

## Utilities

```php
// Open an app
$automator->open('Warp');

// Pause (seconds)
$automator->pause(1);

// Repeat a block of code (e.g. zoom in five times)
$automator->repeat(
    5,
    fn (Automator $remote) => $remote->typeWithCommand('+')->pause(.05),
);
```

## Gotchas

-   This script is actually sending keystrokes to your applications, but it's running at computer speed. Remember to insert reasonable `pause` statements in your scripts to allow your computer to catch up.
-   If you are running a script, it will keep executing until the process itself is stopped or the script finishes. Meaning: If you tab away from the app the script is running in, if the script has more typing to do, it will continue typing. Keep that in mind.

## Examples

### Demo a Raycast Extension

```php
Automator::make()
    ->typeWithCommand(' ')
    ->pause(1)
    ->type('Warp Launch')
    ->pause(.5)
    ->enter()
    ->type('blog-joe-codes')
    ->pause(.5)
    ->enter()
    ->run();
```

### Demo a Code Snippet

```php
Automator::make()
    ->setTypingSpeed(.1)
    ->open('Visual Studio Code')
    ->pause(1)
    ->type('n', [Modifier::SHIFT, Modifier::COMMAND]) // Open a new window
    ->pause(.5)
    ->typeWithCommand('n') // Open a new file
    ->pause(.5)
    ->type('<?php')
    ->pause(.5)
    ->repeat(2, fn (Automator $remote) => $remote->enter()->pause(.25))
    ->type('echo "Hello World!";')
    ->run();
```

## Roadmap

Right now you can basically automate anything you can do with your keyboard. I would like to add:

-   [ ] Mouse control
-   [ ] Window control
-   [ ] File system control
-   [ ] Browser control
