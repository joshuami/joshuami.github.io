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

/* @gin/navigation/fix-toolbar-js-error.html.twig */
class __TwigTemplate_f281471bb89d9018ab9a31359717c0ed extends Template
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
        if (((($context["toolbar_variant"] ?? null) == "new") || ($context["core_navigation"] ?? null))) {
            // line 3
            yield "  <div id=\"toolbar-administration\" class=\"toolbar\" height=\"0px\" hidden>
    <div class=\"toolbar-tab--toolbar-item-shortcuts\" hidden>
      <a id=\"toolbar-item-shortcuts\" class=\"toolbar-item\" data-toolbar-tray=\"toolbar-item-shortcuts-tray\" hidden></a>
      <div id=\"toolbar-item-shortcuts-tray\" class=\"toolbar-tray\" data-toolbar-tray=\"toolbar-item-shortcuts-tray\" hidden></div>
    </div>
    <div class=\"toolbar-tab--toolbar-item-devel\" hidden>
      <a id=\"toolbar-item-devel\" class=\"toolbar-item\" data-toolbar-tray=\"toolbar-item-devel-tray\" hidden></a>
      <div id=\"toolbar-item-devel-tray\" class=\"toolbar-tray\" data-toolbar-tray=\"toolbar-item-devel-tray\" hidden></div>
    </div>
    <div class=\"toolbar-tab--toolbar-item-user\" hidden>
      <a id=\"toolbar-item-user\" class=\"toolbar-item\" data-toolbar-tray=\"toolbar-item-user-tray\" hidden></a>
      <div id=\"toolbar-item-user-tray\" class=\"toolbar-tray\" data-toolbar-tray=\"toolbar-item-user-tray\" hidden></div>
    </div>
    <div class=\"toolbar-toggle-orientation\" hidden>
      <button hidden></button>
    </div>
  </div>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["toolbar_variant", "core_navigation"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@gin/navigation/fix-toolbar-js-error.html.twig";
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
        return array (  46 => 3,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@gin/navigation/fix-toolbar-js-error.html.twig", "/var/www/html/web/themes/contrib/gin/templates/navigation/fix-toolbar-js-error.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 2];
        static $filters = [];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
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
