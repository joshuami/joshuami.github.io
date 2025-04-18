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

/* radix:alert */
class __TwigTemplate_0489babf9707da49c86579b2063328e4 extends Template
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
            'alert_heading' => [$this, 'block_alert_heading'],
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.radix--alert"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "radix:alert"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "radix:alert"));
        // line 13
        $context["alert_attributes"] = ((($context["alert_attributes"] ?? null)) ? ($context["alert_attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 14
        $context["dismissible"] = (((array_key_exists("dismissible", $context) &&  !(null === $context["dismissible"]))) ? ($context["dismissible"]) : (true));
        // line 15
        $context["type"] = (((array_key_exists("type", $context) &&  !(null === $context["type"]))) ? ($context["type"]) : ("primary"));
        // line 16
        yield "
";
        // line 18
        $context["alert_classes"] = Twig\Extension\CoreExtension::merge(["alert", ((        // line 20
($context["type"] ?? null)) ? (("alert-" . ($context["type"] ?? null))) : ("")), ((        // line 21
($context["dismissible"] ?? null)) ? ("alert-dismissible") : (""))], ((        // line 22
($context["alert_utility_classes"] ?? null)) ? ($context["alert_utility_classes"]) : ([])));
        // line 24
        yield "
<div ";
        // line 25
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["alert_attributes"] ?? null), "addClass", [($context["alert_classes"] ?? null)], "method", false, false, true, 25), "html", null, true);
        yield " role=\"alert\">
  ";
        // line 26
        yield from $this->unwrap()->yieldBlock('alert_heading', $context, $blocks);
        // line 31
        yield "
  ";
        // line 32
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 35
        yield "
  ";
        // line 36
        if (($context["dismissible"] ?? null)) {
            // line 37
            yield "    ";
            // line 38
            yield from $this->loadTemplate("radix:close-button", "radix:alert", 38)->unwrap()->yield(CoreExtension::merge($context, ["close_button_attributes" => CoreExtension::getAttribute($this->env, $this->source, $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(), "setAttribute", ["data-bs-dismiss", "alert"], "method", false, false, true, 39)]));
            // line 43
            yield "  ";
        }
        // line 44
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["alert_utility_classes", "heading", "content"]);        yield from [];
    }

    // line 26
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_alert_heading(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 27
        yield "    ";
        if (($context["heading"] ?? null)) {
            // line 28
            yield "      <h4 class=\"alert-heading\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["heading"] ?? null), "html", null, true);
            yield "</h4>
    ";
        }
        // line 30
        yield "  ";
        yield from [];
    }

    // line 32
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 33
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["content"] ?? null), "html", null, true);
        yield "
  ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "radix:alert";
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
        return array (  125 => 33,  118 => 32,  113 => 30,  107 => 28,  104 => 27,  97 => 26,  90 => 44,  87 => 43,  85 => 38,  83 => 37,  81 => 36,  78 => 35,  76 => 32,  73 => 31,  71 => 26,  67 => 25,  64 => 24,  62 => 22,  61 => 21,  60 => 20,  59 => 18,  56 => 16,  54 => 15,  52 => 14,  50 => 13,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "radix:alert", "themes/contrib/radix/components/alert/alert.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 13, "block" => 26, "if" => 36, "include" => 38];
        static $filters = ["merge" => 22, "escape" => 25];
        static $functions = ["create_attribute" => 13];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block', 'if', 'include'],
                ['merge', 'escape'],
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
