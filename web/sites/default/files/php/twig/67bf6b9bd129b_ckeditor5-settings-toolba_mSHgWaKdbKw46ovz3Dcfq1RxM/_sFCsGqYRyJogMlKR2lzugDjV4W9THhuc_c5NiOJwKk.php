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

/* core/modules/ckeditor5/templates/ckeditor5-settings-toolbar.html.twig */
class __TwigTemplate_a95f0e450eecf3a1955c02e2a25855fc extends Template
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
        // line 13
        yield "<fieldset aria-labelledby=\"ckeditor5-toolbar-configuration\" aria-describedby=\"ckeditor5-toolbar-description\">
  <legend id=\"ckeditor5-toolbar-configuration\">";
        // line 14
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Toolbar configuration"));
        yield "</legend>
  <div class=\"fieldset-wrapper\">
    <div id=\"ckeditor5-toolbar-description\" class=\"fieldset-description\">";
        // line 17
        yield t("Move a button into the <em>Active toolbar</em> to enable it, or into the list of <em>Available buttons</em> to disable it. Buttons may be moved with the mouse or keyboard arrow keys.", array());
        // line 20
        yield "</div>
    <div id=\"ckeditor5-toolbar-app\"></div>
    ";
        // line 22
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["form"] ?? null), "html", null, true);
        yield "
  </div>
</fieldset>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["form"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "core/modules/ckeditor5/templates/ckeditor5-settings-toolbar.html.twig";
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
        return array (  58 => 22,  54 => 20,  52 => 17,  47 => 14,  44 => 13,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "core/modules/ckeditor5/templates/ckeditor5-settings-toolbar.html.twig", "/var/www/html/web/core/modules/ckeditor5/templates/ckeditor5-settings-toolbar.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["trans" => 17];
        static $filters = ["t" => 14, "escape" => 22];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['trans'],
                ['t', 'escape'],
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
