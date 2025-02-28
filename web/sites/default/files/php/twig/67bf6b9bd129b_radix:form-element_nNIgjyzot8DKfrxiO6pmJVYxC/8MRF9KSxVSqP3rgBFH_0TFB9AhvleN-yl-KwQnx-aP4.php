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

/* radix:form-element */
class __TwigTemplate_11e45d073e440306044e79cc0c8f7448 extends Template
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
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.radix--form-element"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "radix:form-element"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "radix:form-element"));
        // line 50
        $context["form_element_classes"] = Twig\Extension\CoreExtension::merge(["js-form-item", "form-item", ("form-type-" . \Drupal\Component\Utility\Html::getClass(        // line 53
($context["type"] ?? null))), ("js-form-type-" . \Drupal\Component\Utility\Html::getClass(        // line 54
($context["type"] ?? null))), ("form-item-" . \Drupal\Component\Utility\Html::getClass(        // line 55
($context["name"] ?? null))), ("js-form-item-" . \Drupal\Component\Utility\Html::getClass(        // line 56
($context["name"] ?? null))), ((!CoreExtension::inFilter(        // line 57
($context["title_display"] ?? null), ["after", "before"])) ? ("form-no-label") : ("")), (((        // line 58
($context["disabled"] ?? null) == "disabled")) ? ("form-disabled disabled") : ("")), ((        // line 59
($context["errors"] ?? null)) ? ("form-item--error has-error") : ("")), "form-group"], ((        // line 61
($context["form_element_utility_classes"] ?? null)) ? ($context["form_element_utility_classes"]) : ([])));
        // line 63
        yield "
";
        // line 65
        $context["description_classes"] = ["description", "form-text", "text-muted", (((        // line 69
($context["description_display"] ?? null) == "invisible")) ? ("visually-hidden") : (""))];
        // line 72
        yield "
";
        // line 73
        $context["form_element_attributes"] = ((($context["attributes"] ?? null)) ? ($context["attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 74
        yield "
<div";
        // line 75
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["form_element_attributes"] ?? null), "addClass", [($context["form_element_classes"] ?? null)], "method", false, false, true, 75), "html", null, true);
        yield ">
  ";
        // line 76
        if (CoreExtension::inFilter(($context["label_display"] ?? null), ["before", "invisible"])) {
            // line 77
            yield "    ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["label"] ?? null), "html", null, true);
            yield "
  ";
        }
        // line 79
        yield "
  ";
        // line 80
        if (((!Twig\Extension\CoreExtension::testEmpty(($context["prefix"] ?? null))) || (!Twig\Extension\CoreExtension::testEmpty(($context["suffix"] ?? null))))) {
            // line 81
            yield "    <div class=\"input-group\">
    ";
        }
        // line 83
        yield "
    ";
        // line 84
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["prefix"] ?? null))) {
            // line 85
            yield "      <span class=\"field-prefix input-group-text\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["prefix"] ?? null), "html", null, true);
            yield "</span>
    ";
        }
        // line 87
        yield "
    ";
        // line 88
        if (((($context["description_display"] ?? null) == "before") && CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 88))) {
            // line 89
            yield "      <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 89), "html", null, true);
            yield ">
        ";
            // line 90
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 90), "html", null, true);
            yield "
      </div>
    ";
        }
        // line 93
        yield "
    ";
        // line 94
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["children"] ?? null), "html", null, true);
        yield "

    ";
        // line 96
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["suffix"] ?? null))) {
            // line 97
            yield "      <span class=\"field-suffix input-group-text\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["suffix"] ?? null), "html", null, true);
            yield "</span>
    ";
        }
        // line 99
        yield "
    ";
        // line 100
        if (((!Twig\Extension\CoreExtension::testEmpty(($context["prefix"] ?? null))) || (!Twig\Extension\CoreExtension::testEmpty(($context["suffix"] ?? null))))) {
            // line 101
            yield "    </div>
  ";
        }
        // line 103
        yield "
  ";
        // line 104
        if ((($context["label_display"] ?? null) == "after")) {
            // line 105
            yield "    ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["label"] ?? null), "html", null, true);
            yield "
  ";
        }
        // line 107
        yield "
  ";
        // line 108
        if (($context["errors"] ?? null)) {
            // line 109
            yield "    <div class=\"invalid-feedback\">
      ";
            // line 110
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["errors"] ?? null), "html", null, true);
            yield "
    </div>
  ";
        }
        // line 113
        yield "
  ";
        // line 114
        if ((CoreExtension::inFilter(($context["description_display"] ?? null), ["after", "invisible"]) && CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 114))) {
            // line 115
            yield "    <small";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "attributes", [], "any", false, false, true, 115), "addClass", [($context["description_classes"] ?? null)], "method", false, false, true, 115), "html", null, true);
            yield ">
      ";
            // line 116
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["description"] ?? null), "content", [], "any", false, false, true, 116), "html", null, true);
            yield "
    </small>
  ";
        }
        // line 119
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["type", "name", "title_display", "disabled", "errors", "form_element_utility_classes", "description_display", "attributes", "label_display", "label", "prefix", "suffix", "description", "children"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "radix:form-element";
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
        return array (  186 => 119,  180 => 116,  175 => 115,  173 => 114,  170 => 113,  164 => 110,  161 => 109,  159 => 108,  156 => 107,  150 => 105,  148 => 104,  145 => 103,  141 => 101,  139 => 100,  136 => 99,  130 => 97,  128 => 96,  123 => 94,  120 => 93,  114 => 90,  109 => 89,  107 => 88,  104 => 87,  98 => 85,  96 => 84,  93 => 83,  89 => 81,  87 => 80,  84 => 79,  78 => 77,  76 => 76,  72 => 75,  69 => 74,  67 => 73,  64 => 72,  62 => 69,  61 => 65,  58 => 63,  56 => 61,  55 => 59,  54 => 58,  53 => 57,  52 => 56,  51 => 55,  50 => 54,  49 => 53,  48 => 50,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "radix:form-element", "themes/contrib/radix/components/form-element/form-element.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 50, "if" => 76];
        static $filters = ["merge" => 61, "clean_class" => 53, "escape" => 75];
        static $functions = ["create_attribute" => 73];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['merge', 'clean_class', 'escape'],
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
