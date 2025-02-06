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

/* @gin/navigation/navigation.html.twig */
class __TwigTemplate_d4d4372bb0d440a13ce12da6ec29bd1c extends Template
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
        // line 2
        try {
            $_v0 = $this->loadTemplate("@navigation/navigation.html.twig", "@gin/navigation/navigation.html.twig", 2);
        } catch (LoaderError $e) {
            // ignore missing template
            $_v0 = null;
        }
        if ($_v0) {
            yield from $_v0->unwrap()->yield(CoreExtension::merge($context, ["logo_path" => ($context["icon_path"] ?? null)]));
        }
        // line 3
        yield "
";
        // line 5
        try {
            $_v1 = $this->loadTemplate("@navigation/layouts/navigation.html.twig", "@gin/navigation/navigation.html.twig", 5);
        } catch (LoaderError $e) {
            // ignore missing template
            $_v1 = null;
        }
        if ($_v1) {
            yield from $_v1->unwrap()->yield(CoreExtension::merge($context, ["logo_path" => ($context["icon_path"] ?? null)]));
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["icon_path"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@gin/navigation/navigation.html.twig";
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
        return array (  57 => 5,  54 => 3,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@gin/navigation/navigation.html.twig", "/var/www/html/web/themes/contrib/gin/templates/navigation/navigation.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["include" => 2];
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
