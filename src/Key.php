<?php

namespace Automator;

// https://eastmanreference.com/complete-list-of-applescript-key-codes

enum Key
{
    case ESC;
    case F1;
    case F2;
    case F3;
    case F4;
    case F5;
    case F6;
    case F7;
    case F8;
    case F9;
    case F10;
    case F11;
    case F12;
    case A;
    case B;
    case C;
    case D;
    case E;
    case F;
    case G;
    case H;
    case I;
    case J;
    case K;
    case L;
    case M;
    case N;
    case O;
    case P;
    case Q;
    case R;
    case S;
    case T;
    case U;
    case V;
    case W;
    case X;
    case Y;
    case Z;
    case NUMBER1;
    case NUMBER2;
    case NUMBER3;
    case NUMBER4;
    case NUMBER5;
    case NUMBER6;
    case NUMBER7;
    case NUMBER8;
    case NUMBER9;
    case NUMBER0;
    case RETURN;
    case TAB;
    case SPACE;
    case UNDERSCORE;
    case MINUS;
    case EQUAL;
    case PLUS;
    case LEFTBRACKET;
    case RIGHTBRACKET;
    case BACKSLASH;
    case SEMICOLON;
    case APOSTROPHE;
    case GRAVE;
    case COMMA;
    case PERIOD;
    case SLASH;
    case CAPSLOCK;
    case ARROW_DOWN;
    case ARROW_LEFT;
    case ARROW_RIGHT;
    case ARROW_UP;
    case HOME;
    case END;
    case PAGE_UP;
    case PAGE_DOWN;
    case BACKSPACE;
    case DELETE;
    case ESCAPE;

    public static function fromName(string $name): ?Key
    {
        $result = match ($name) {
            '+'     => Key::PLUS,
            '-'     => Key::MINUS,
            '_'     => Key::UNDERSCORE,
            '['     => Key::LEFTBRACKET,
            ']'     => Key::RIGHTBRACKET,
            '\\'    => Key::BACKSLASH,
            ';'     => Key::SEMICOLON,
            "'"     => Key::APOSTROPHE,
            '`'     => Key::GRAVE,
            ','     => Key::COMMA,
            '.'     => Key::PERIOD,
            '/'     => Key::SLASH,
            ' '     => Key::SPACE,
            PHP_EOL => Key::RETURN,
            default => null,
        };

        if ($result) {
            return $result;
        }

        $name = strtoupper($name);

        if (is_numeric($name)) {
            $name = "NUMBER{$name}";
        }

        foreach (self::cases() as $status) {
            if ($name === $status->name) {
                return $status;
            }
        }

        return null;
    }

    public function keyCode()
    {
        return match ($this) {
            Key::ESC          => 53,
            Key::F1           => 122,
            Key::F2           => 120,
            Key::F3           => 99,
            Key::F4           => 118,
            Key::F5           => 96,
            Key::F6           => 97,
            Key::F7           => 98,
            Key::F8           => 100,
            Key::F9           => 101,
            Key::F10          => 109,
            Key::F11          => 103,
            Key::F12          => 111,
            Key::A            => 0,
            Key::B            => 11,
            Key::C            => 8,
            Key::D            => 2,
            Key::E            => 14,
            Key::F            => 3,
            Key::G            => 5,
            Key::H            => 4,
            Key::I            => 34,
            Key::J            => 38,
            Key::K            => 40,
            Key::L            => 37,
            Key::M            => 46,
            Key::N            => 45,
            Key::O            => 31,
            Key::P            => 35,
            Key::Q            => 12,
            Key::R            => 15,
            Key::S            => 1,
            Key::T            => 17,
            Key::U            => 32,
            Key::V            => 9,
            Key::W            => 13,
            Key::X            => 7,
            Key::Y            => 16,
            Key::Z            => 6,
            Key::NUMBER1      => 18,
            Key::NUMBER2      => 19,
            Key::NUMBER3      => 20,
            Key::NUMBER4      => 21,
            Key::NUMBER5      => 23,
            Key::NUMBER6      => 22,
            Key::NUMBER7      => 26,
            Key::NUMBER8      => 28,
            Key::NUMBER9      => 25,
            Key::NUMBER0      => 29,
            Key::RETURN       => 36,
            Key::TAB          => 48,
            Key::SPACE        => 49,
            Key::UNDERSCORE   => 27,
            Key::MINUS        => 27,
            Key::EQUAL        => 24,
            Key::PLUS         => 24,
            Key::LEFTBRACKET  => 33,
            Key::RIGHTBRACKET => 30,
            Key::BACKSLASH    => 42,
            Key::SEMICOLON    => 41,
            Key::APOSTROPHE   => 39,
            Key::GRAVE        => 50,
            Key::COMMA        => 43,
            Key::PERIOD       => 47,
            Key::SLASH        => 44,
            Key::CAPSLOCK     => 57,
            Key::ARROW_DOWN   => 125,
            Key::ARROW_LEFT   => 123,
            Key::ARROW_RIGHT  => 124,
            Key::ARROW_UP     => 126,
            Key::HOME         => 115,
            Key::END          => 119,
            Key::PAGE_UP      => 116,
            Key::PAGE_DOWN    => 121,
            Key::BACKSPACE    => 51,
            Key::DELETE       => 117,
            Key::ESCAPE       => 53,
        };
    }
}
