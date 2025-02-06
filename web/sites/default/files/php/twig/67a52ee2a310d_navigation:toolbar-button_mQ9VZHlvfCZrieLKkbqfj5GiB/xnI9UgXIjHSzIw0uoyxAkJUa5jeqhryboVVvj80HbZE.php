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

/* navigation:toolbar-button */
class __TwigTemplate_8385c3d3dd622b2e3885e44f1f7dc0f2 extends Template
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
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.navigation--toolbar-button"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "navigation:toolbar-button"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "navigation:toolbar-button"));
        // line 4
        $context["classes"] = ["toolbar-button", ((        // line 6
($context["icon"] ?? null)) ? (("toolbar-button--icon--" . ($context["icon"] ?? null))) : (""))];
        // line 9
        yield "
";
        // line 10
        if (is_iterable(($context["modifiers"] ?? null))) {
            // line 11
            yield "  ";
            $context["classes"] = Twig\Extension\CoreExtension::merge(($context["classes"] ?? null), Twig\Extension\CoreExtension::map($this->env, ($context["modifiers"] ?? null), function ($__modifier__) use ($context, $macros) { $context["modifier"] = $__modifier__; return ("toolbar-button--" . ($context["modifier"] ?? null)); }));
        }
        // line 13
        yield "
";
        // line 14
        if (is_iterable(($context["extra_classes"] ?? null))) {
            // line 15
            yield "  ";
            $context["classes"] = Twig\Extension\CoreExtension::merge(($context["classes"] ?? null), ($context["extra_classes"] ?? null));
        }
        // line 17
        yield "
";
        // line 18
        if ((($context["text"] ?? null) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["text"] ?? null)) > 1))) {
            // line 19
            yield "  ";
            // line 21
            yield "  ";
            $context["icon_text"] = Twig\Extension\CoreExtension::join(Twig\Extension\CoreExtension::slice($this->env->getCharset(), ($context["text"] ?? null), 0, 2), "");
            // line 22
            yield "  ";
            $context["attributes"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "setAttribute", ["data-index-text", Twig\Extension\CoreExtension::lower($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), ($context["text"] ?? null)))], "method", false, false, true, 22), "setAttribute", ["data-icon-text", ($context["icon_text"] ?? null)], "method", false, false, true, 22);
        }
        // line 24
        yield "
<";
        // line 25
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("html_tag", $context)) ? (Twig\Extension\CoreExtension::default(($context["html_tag"] ?? null), "button")) : ("button")), "html", null, true);
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 25), "html", null, true);
        yield ">
  ";
        // line 26
        if (($context["action"] ?? null)) {
            // line 27
            yield "    <span data-toolbar-action class=\"visually-hidden\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["action"] ?? null), "html", null, true);
            yield "</span>
  ";
        }
        // line 29
        yield "  ";
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 34
        yield "
</";
        // line 35
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("html_tag", $context)) ? (Twig\Extension\CoreExtension::default(($context["html_tag"] ?? null), "button")) : ("button")), "html", null, true);
        yield ">
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["icon", "modifiers", "modifier", "extra_classes", "text", "html_tag", "action"]);        yield from [];
    }

    // line 29
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 30
        yield "    ";
        if (($context["text"] ?? null)) {
            // line 31
            yield "      <span class=\"toolbar-button__label\" data-toolbar-text>";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["text"] ?? null), "html", null, true);
            yield "</span>
    ";
        }
        // line 33
        yield "  ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "navigation:toolbar-button";
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
        return array (  131 => 33,  125 => 31,  122 => 30,  115 => 29,  107 => 35,  104 => 34,  101 => 29,  95 => 27,  93 => 26,  87 => 25,  84 => 24,  80 => 22,  77 => 21,  75 => 19,  73 => 18,  70 => 17,  66 => 15,  64 => 14,  61 => 13,  57 => 11,  55 => 10,  52 => 9,  50 => 6,  49 => 4,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "navigation:toolbar-button", "core/modules/navigation/components/toolbar-button/toolbar-button.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 4, "if" => 10, "block" => 29];
        static $filters = ["merge" => 11, "map" => 11, "length" => 18, "join" => 21, "slice" => 21, "lower" => 22, "first" => 22, "escape" => 25, "default" => 25];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['merge', 'map', 'length', 'join', 'slice', 'lower', 'first', 'escape', 'default'],
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
