#!/usr/bin/env osascript -l JavaScript

const se = Application('System Events');

function type(text) {
    text.split('').forEach((char) => {
        se.keystroke(char);
        delay({{typingSpeed}});
    });
}