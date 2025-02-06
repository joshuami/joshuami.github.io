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

/* modules/contrib/gin_toolbar/templates/navigation.html.twig */
class __TwigTemplate_75c5e562c528e8decdb1aa8f93926874 extends Template
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
        if (((($context["secondary_toolbar_frontend"] ?? null) && ($context["core_navigation"] ?? null)) &&  !($context["is_backend"] ?? null))) {
            // line 8
            yield "  ";
            try {
                $_v0 = $this->loadTemplate("@gin_toolbar/toolbar--gin--secondary--frontend.html.twig", "modules/contrib/gin_toolbar/templates/navigation.html.twig", 8);
            } catch (LoaderError $e) {
                // ignore missing template
                $_v0 = null;
            }
            if ($_v0) {
                yield from $_v0->unwrap()->yield($context);
            }
        }
        // line 10
        yield "
";
        // line 11
        try {
            $_v1 = $this->loadTemplate("@gin/navigation/navigation.html.twig", "modules/contrib/gin_toolbar/templates/navigation.html.twig", 11);
        } catch (LoaderError $e) {
            // ignore missing template
            $_v1 = null;
        }
        if ($_v1) {
            yield from $_v1->unwrap()->yield($context);
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["secondary_toolbar_frontend", "core_navigation", "is_backend"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/contrib/gin_toolbar/templates/navigation.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  61 => 11,  58 => 10,  46 => 8,  44 => 7,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/contrib/gin_toolbar/templates/navigation.html.twig", "/var/www/html/web/modules/contrib/gin_toolbar/templates/navigation.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 7, "include" => 8];
        static $filters = [];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'include'],
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
