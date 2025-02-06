<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* modules/contrib/gin_toolbar/templates/menu--toolbar.html.twig */
class __TwigTemplate_b193637a121a8ce810283f5b88f57f4f extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 7
        try {
            $_v0 = $this->loadTemplate("@gin/navigation/menu--toolbar--gin.html.twig", "modules/contrib/gin_toolbar/templates/menu--toolbar.html.twig", 7);
        } catch (LoaderError $e) {
            // ignore missing template
            $_v0 = null;
        }
        if ($_v0) {
            yield from $_v0->unwrap()->yield($context);
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/contrib/gin_toolbar/templates/menu--toolbar.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  44 => 7,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/contrib/gin_toolbar/templates/menu--toolbar.html.twig", "/var/www/html/web/modules/contrib/gin_toolbar/templates/menu--toolbar.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["include" => 7];
        static $filters = [];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['include'],
                [],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
