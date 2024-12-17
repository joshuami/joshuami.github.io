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

/* core/modules/navigation/templates/big-pipe-interface-preview--navigation-shortcut-lazy-builder-lazyLinks--Shortcuts.html.twig */
class __TwigTemplate_a561d2707b8abcfd78ecf9949aa0ee48 extends Template
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
        // line 8
        yield "
";
        // line 9
        yield from $this->loadTemplate("navigation:toolbar-button", "core/modules/navigation/templates/big-pipe-interface-preview--navigation-shortcut-lazy-builder-lazyLinks--Shortcuts.html.twig", 9)->unwrap()->yield(CoreExtension::toArray(["attributes" => $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(), "modifiers" => ["expand--side", "collapsible"], "extra_classes" => ["invisible", "toolbar-popover__control"], "icon" => "shortcuts", "text" => t("Shortcuts")]));
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "core/modules/navigation/templates/big-pipe-interface-preview--navigation-shortcut-lazy-builder-lazyLinks--Shortcuts.html.twig";
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
        return array (  47 => 9,  44 => 8,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "core/modules/navigation/templates/big-pipe-interface-preview--navigation-shortcut-lazy-builder-lazyLinks--Shortcuts.html.twig", "/var/www/html/web/core/modules/navigation/templates/big-pipe-interface-preview--navigation-shortcut-lazy-builder-lazyLinks--Shortcuts.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 9);
        static $filters = array("t" => 20);
        static $functions = array("create_attribute" => 10);

        try {
            $this->sandbox->checkSecurity(
                ['include'],
                ['t'],
                ['create_attribute'],
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
