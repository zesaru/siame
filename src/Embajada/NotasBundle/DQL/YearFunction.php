<?php
namespace Embajada\NotasBundle\DQL;

use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\SqlWalker;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\AST\Functions\FunctionNode;

class YearFunction extends FunctionNode
{
    public $fecha;

    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
        return "YEAR(" . $this->fecha->dispatch($sqlWalker) . ")";
    }

    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
        $lexer = $parser->getLexer();

        $parser->match(Lexer::T_IDENTIFIER);       //Nombre de la Funcion
        $parser->match(Lexer::T_OPEN_PARENTHESIS); //Parantesis abierto

        $this->fecha = $parser->ArithmeticPrimary(); //Dato

        $parser->match(Lexer::T_CLOSE_PARENTHESIS); //Parentesis Cerrado
    }
}