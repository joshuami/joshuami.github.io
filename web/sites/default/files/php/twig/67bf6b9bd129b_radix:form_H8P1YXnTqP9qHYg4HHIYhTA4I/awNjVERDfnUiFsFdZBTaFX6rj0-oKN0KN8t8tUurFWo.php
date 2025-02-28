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

/* radix:form */
class __TwigTemplate_8a7cba7e4043abd124a9aea873f40792 extends Template
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
            'form_children' => [$this, 'block_form_children'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.radix--form"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "radix:form"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "radix:form"));
        // line 15
        $context["form_attributes"] = ((($context["attributes"] ?? null)) ? ($context["attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 16
        yield "
";
        // line 18
        $context["form_classes"] = Twig\Extension\CoreExtension::merge(["form", ((CoreExtension::getAttribute($this->env, $this->source,         // line 20
($context["form_attributes"] ?? null), "id", [], "any", false, false, true, 20)) ? (("form--" . \Drupal\Component\Utility\Html::getClass(CoreExtension::getAttribute($this->env, $this->source, ($context["form_attributes"] ?? null), "id", [], "any", false, false, true, 20)))) : ("")), ((        // line 21
($context["is_inline"] ?? null)) ? ("form-inline") : (""))], ((        // line 22
($context["form_utility_classes"] ?? null)) ? ($context["form_utility_classes"]) : ([])));
        // line 24
        yield "
<form ";
        // line 25
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["form_attributes"] ?? null), "addClass", [($context["form_classes"] ?? null)], "method", false, false, true, 25), "html", null, true);
        yield ">
  ";
        // line 26
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield "
  ";
        // line 27
        yield from $this->unwrap()->yieldBlock('form_children', $context, $blocks);
        // line 30
        yield "  ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "
</form>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "is_inline", "form_utility_classes", "title_prefix", "title_suffix", "children"]);        yield from [];
    }

    // line 27
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_form_children(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 28
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["children"] ?? null), "html", null, true);
        yield "
  ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "radix:form";
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
        return array (  89 => 28,  82 => 27,  72 => 30,  70 => 27,  66 => 26,  62 => 25,  59 => 24,  57 => 22,  56 => 21,  55 => 20,  54 => 18,  51 => 16,  49 => 15,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "radix:form", "themes/contrib/radix/components/form/form.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 15, "block" => 27];
        static $filters = ["merge" => 22, "clean_class" => 20, "escape" => 25];
        static $functions = ["create_attribute" => 15];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block'],
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
