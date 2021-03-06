<?php

namespace hafriedlander\Peg\Compiler\Token;

use hafriedlander\Peg\Compiler\Token;

abstract class Terminal extends Token
{
    public function set_text($text)
    {
        return $this->silent ? null : '$result["_text"] .= ' . $text . ';';
    }

    protected function match_code($value)
    {
        return $this->match_fail_conditional(
            'false !== ($subres = $this->'.$this->type.'('.$value.'))', 
            $this->set_text('$subres')
        );
    }
}
