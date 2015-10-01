<?php
if (!defined('ENT_SUBSTITUTE')) {
    define('ENT_SUBSTITUTE', 8);
}

class Twig_Extension_Markdown extends Twig_Extension
{
    public function getTokenParsers()
    {
        require_once dirname(__FILE__).'/../TokenParser/Markdown.php';
        return array(
            new Twig_TokenParser_Markdown(),
        );
    }

    public function getFilters()
    {
        if (class_exists('Twig_SimpleFilter', true)) {
            return array(new Twig_SimpleFilter('markdown','twig_markdown'));
        }
        return array( 'markdown'=> new Twig_Filter_Function('twig_markdown') );
    }

    public function getName()
    {
        return 'markdown';
    }

}

function twig_markdown($data)
{
    return Markdown($data);
}

