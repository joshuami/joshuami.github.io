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

/* modules/contrib/gin_toolbar/templates/toolbar.html.twig */
class __TwigTemplate_70fca082e40be1dc0d8126eee1d497ff extends Template
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
        if (($context["core_navigation"] ?? null)) {
            // line 8
            yield "  ";
            if (($context["secondary_toolbar_frontend"] ?? null)) {
                // line 9
                yield "    ";
                try {
                    $_v0 = $this->loadTemplate("@gin/navigation/toolbar--gin--secondary.html.twig", "modules/contrib/gin_toolbar/templates/toolbar.html.twig", 9);
                } catch (LoaderError $e) {
                    // ignore missing template
                    $_v0 = null;
                }
                if ($_v0) {
                    yield from $_v0->unwrap()->yield($context);
                }
                // line 10
                yield "  ";
            }
        } else {
            // line 12
            yield "  ";
            try {
                $_v1 = $this->loadTemplate("@gin/navigation/toolbar--gin.html.twig", "modules/contrib/gin_toolbar/templates/toolbar.html.twig", 12);
            } catch (LoaderError $e) {
                // ignore missing template
                $_v1 = null;
            }
            if ($_v1) {
                yield from $_v1->unwrap()->yield($context);
            }
            // line 13
            yield "
  ";
            // line 14
            if ((($context["secondary_toolbar_frontend"] ?? null) && (($context["toolbar_variant"] ?? null) != "classic"))) {
                // line 15
                yield "    ";
                try {
                    $_v2 = $this->loadTemplate("@gin_toolbar/toolbar--gin--secondary--frontend.html.twig", "modules/contrib/gin_toolbar/templates/toolbar.html.twig", 15);
                } catch (LoaderError $e) {
                    // ignore missing template
                    $_v2 = null;
                }
                if ($_v2) {
                    yield from $_v2->unwrap()->yield($context);
                }
                // line 16
                yield "  ";
            }
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["core_navigation", "secondary_toolbar_frontend", "toolbar_variant"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/contrib/gin_toolbar/templates/toolbar.html.twig";
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
        return array (  91 => 16,  80 => 15,  78 => 14,  75 => 13,  64 => 12,  60 => 10,  49 => 9,  46 => 8,  44 => 7,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/contrib/gin_toolbar/templates/toolbar.html.twig", "/var/www/html/web/modules/contrib/gin_toolbar/templates/toolbar.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 7, "include" => 9];
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
