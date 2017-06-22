<?php

use PHPUnit\Framework\TestCase;

class MarkdownTest extends TestCase
{
    public function testAddExtension()
    {
        $loader = new Twig_Loader_Filesystem([ 'tests/fixtures' ]);
        $env = new Twig_Environment($loader, array());
        $env->addExtension(new Twig_Extension_Markdown);

        $template = $env->loadTemplate('simple.markdown');
        $this->assertNotNull($template);
        $output = $template->render([  ]);
        $this->assertNotNull($output);
        $this->assertContains('<h2>Header1</h2>',$output);
    }
}

