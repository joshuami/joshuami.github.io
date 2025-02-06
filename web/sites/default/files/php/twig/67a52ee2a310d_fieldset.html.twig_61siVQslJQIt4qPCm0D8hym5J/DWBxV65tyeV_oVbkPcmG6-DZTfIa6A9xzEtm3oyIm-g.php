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

/* themes/contrib/gin/templates/form/fieldset.html.twig */
class __TwigTemplate_b013bb277799b0fe400f31f8e3644ff0 extends Template
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
        // line 29
        $context["show_description_toggle"] = (($context["description_toggle"] ?? null) && CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 29));
        // line 31
        $context["classes"] = ["fieldset", ((CoreExtension::getAttribute($this->env, $this->source,         // line 33
($context["attributes"] ?? null), "hasClass", ["fieldgroup"], "method", false, false, true, 33)) ? ("fieldset--group") : ("")), "js-form-item", "form-item", "js-form-wrapper", "form-wrapper", ((        // line 38
($context["show_description_toggle"] ?? null)) ? ("help-icon__description-container") : (""))];
        // line 42
        $context["wrapper_classes"] = ["fieldset__wrapper", ((CoreExtension::getAttribute($this->env, $this->source,         // line 44
($context["attributes"] ?? null), "hasClass", ["fieldgroup"], "method", false, false, true, 44)) ? ("fieldset__wrapper--group") : (""))];
        // line 48
        $context["legend_span_classes"] = ["fieldset__label", ((CoreExtension::getAttribute($this->env, $this->source,         // line 50
($context["attributes"] ?? null), "hasClass", ["fieldgroup"], "method", false, false, true, 50)) ? ("fieldset__label--group") : ("")), ((        // line 51
($context["required"] ?? null)) ? ("js-form-required") : ("")), ((        // line 52
($context["required"] ?? null)) ? ("form-required") : (""))];
        // line 56
        $context["legend_classes"] = ["fieldset__legend", (((CoreExtension::getAttribute($this->env, $this->source,         // line 58
($context["attributes"] ?? null), "hasClass", ["fieldgroup"], "method", false, false, true, 58) &&  !CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "hasClass", ["form-composite"], "method", false, false, true, 58))) ? ("fieldset__legend--group") : ("")), ((CoreExtension::getAttribute($this->env, $this->source,         // line 59
($context["attributes"] ?? null), "hasClass", ["form-composite"], "method", false, false, true, 59)) ? ("fieldset__legend--composite") : ("")), (((        // line 60
($context["title_display"] ?? null) == "invisible")) ? ("fieldset__legend--invisible") : ("fieldset__legend--visible"))];
        // line 64
        $context["description_classes"] = ["fieldset__description", (((        // line 66
($context["show_description_toggle"] ?? null) == "invisible")) ? ("visually-hidden") : (""))];
        // line 69
        yield "<fieldset";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 69), "html", null, true);
        yield ">
  ";
        // line 70
        if (($context["show_description_toggle"] ?? null)) {
            // line 71
            yield "    <div class=\"help-icon\">
  ";
        }
        // line 73
        yield "  ";
        // line 74
        yield "  ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["legend"] ?? null), "title", [], "any", false, false, true, 74)) {
            // line 75
            yield "    <legend";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["legend"] ?? null), "attributes", [], "any", false, false, true, 75), "addClass", [($context["legend_classes"] ?? null)], "method", false, false, true, 75), "html", null, true);
            yield ">
      <span";
            // line 76
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["legend_span"] ?? null), "attributes", [], "any", false, false, true, 76), "addClass", [($context["legend_span_classes"] ?? null)], "method", false, false, true, 76), "html", null, true);
            yield ">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["legend"] ?? null), "title", [], "any", false, false, true, 76), "html", null, true);
            yield "</span>
    </legend>
  ";
        }
        // line 79
        yield "  ";
        if (($context["show_description_toggle"] ?? null)) {
            // line 80
            yield "      ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("gin/gin_description_toggle"), "html", null, true);
            yield "
      <button class=\"help-icon__description-toggle\"></button>
    </div>
  ";
        }
        // line 84
        yield "  <div";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [($context["wrapper_classes"] ?? null)], "method", false, false, true, 84), "html", null, true);
        yield ">
    ";
        // line 85
        if (((($context["description_display"] ?? null) == "before") && CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 85))) {
            // line 86
            yield "      <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 86), "addClass", [($context["description_classes"] ?? null)], "method", false, false, true, 86), "html", null, true);
            yield ">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 86), "html", null, true);
            yield "</div>
    ";
        }
        // line 88
        yield "    ";
        if (($context["inline_items"] ?? null)) {
            // line 89
            yield "    <div class=\"container-inline\">
      ";
        }
        // line 91
        yield "
      ";
        // line 92
        if (($context["prefix"] ?? null)) {
            // line 93
            yield "        <span class=\"fieldset__prefix\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["prefix"] ?? null), "html", null, true);
            yield "</span>
      ";
        }
        // line 95
        yield "      ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["children"] ?? null), "html", null, true);
        yield "
      ";
        // line 96
        if (($context["suffix"] ?? null)) {
            // line 97
            yield "        <span class=\"fieldset__suffix\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["suffix"] ?? null), "html", null, true);
            yield "</span>
      ";
        }
        // line 99
        yield "      ";
        if (($context["errors"] ?? null)) {
            // line 100
            yield "        <div class=\"fieldset__error-message\">
          ";
            // line 101
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["errors"] ?? null), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 104
        yield "      ";
        if ((CoreExtension::inFilter(($context["description_display"] ?? null), ["after", "invisible"]) && CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 104))) {
            // line 105
            yield "        <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 105), "addClass", [($context["description_classes"] ?? null)], "method", false, false, true, 105), "html", null, true);
            yield ">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 105), "html", null, true);
            yield "</div>
      ";
        }
        // line 107
        yield "
      ";
        // line 108
        if (($context["inline_items"] ?? null)) {
            // line 109
            yield "    </div>
    ";
        }
        // line 111
        yield "  </div>
</fieldset>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["description_toggle", "description", "attributes", "required", "title_display", "legend", "legend_span", "content_attributes", "description_display", "inline_items", "prefix", "children", "suffix", "errors"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/contrib/gin/templates/form/fieldset.html.twig";
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
        return array (  184 => 111,  180 => 109,  178 => 108,  175 => 107,  167 => 105,  164 => 104,  158 => 101,  155 => 100,  152 => 99,  146 => 97,  144 => 96,  139 => 95,  133 => 93,  131 => 92,  128 => 91,  124 => 89,  121 => 88,  113 => 86,  111 => 85,  106 => 84,  98 => 80,  95 => 79,  87 => 76,  82 => 75,  79 => 74,  77 => 73,  73 => 71,  71 => 70,  66 => 69,  64 => 66,  63 => 64,  61 => 60,  60 => 59,  59 => 58,  58 => 56,  56 => 52,  55 => 51,  54 => 50,  53 => 48,  51 => 44,  50 => 42,  48 => 38,  47 => 33,  46 => 31,  44 => 29,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/contrib/gin/templates/form/fieldset.html.twig", "/var/www/html/web/themes/contrib/gin/templates/form/fieldset.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 29, "if" => 70];
        static $filters = ["escape" => 69];
        static $functions = ["attach_library" => 80];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape'],
                ['attach_library'],
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
