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

/* radix:views-view--grid */
class __TwigTemplate_441b7dc924f75267429bb31d353fe6cf extends Template
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
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.radix--views-view--grid"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "radix:views-view--grid"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "radix:views-view--grid"));
        // line 26
        $context["classes"] = Twig\Extension\CoreExtension::merge(["views-view--grid", CoreExtension::getAttribute($this->env, $this->source,         // line 28
($context["options"] ?? null), "alignment", [], "any", false, false, true, 28), (((CoreExtension::getAttribute($this->env, $this->source,         // line 29
($context["options"] ?? null), "alignment", [], "any", false, false, true, 29) == "vertical")) ? ("row") : ("")), ("cols-" . CoreExtension::getAttribute($this->env, $this->source,         // line 30
($context["options"] ?? null), "columns", [], "any", false, false, true, 30)), "clearfix"], ((        // line 32
($context["view_view__grid_utility_classes"] ?? null)) ? ($context["view_view__grid_utility_classes"]) : ([])));
        // line 34
        yield "
";
        // line 35
        $context["row_classes"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "row_class_default", [], "any", false, false, true, 35)) ? (["views-row", (((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "alignment", [], "any", false, false, true, 35) == "horizontal")) ? ("clearfix") : (""))]) : ([]));
        // line 36
        $context["col_classes"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "col_class_default", [], "any", false, false, true, 36)) ? (["views-col", (((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "alignment", [], "any", false, false, true, 36) == "vertical")) ? ("clearfix") : (""))]) : ([]));
        // line 37
        yield "
";
        // line 38
        if (($context["title"] ?? null)) {
            // line 39
            yield "  ";
            // line 40
            yield from $this->loadTemplate("radix:heading", "radix:views-view--grid", 40)->unwrap()->yield(CoreExtension::merge($context, ["heading_html_tag" => "h3", "content" =>             // line 42
($context["title"] ?? null)]));
        }
        // line 46
        yield "
<div";
        // line 47
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 47), "html", null, true);
        yield ">
  ";
        // line 48
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "alignment", [], "any", false, false, true, 48) == "horizontal")) {
            // line 49
            yield "    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 50
                yield "      <div";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 50), "addClass", [($context["row_classes"] ?? null)], "method", false, false, true, 50), "html", null, true);
                yield ">
        ";
                // line 51
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "content", [], "any", false, false, true, 51));
                foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                    // line 52
                    yield "          <div";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 52), "addClass", [($context["col_classes"] ?? null)], "method", false, false, true, 52), "html", null, true);
                    yield ">";
                    // line 53
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 53), "html", null, true);
                    // line 54
                    yield "</div>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['column'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 56
                yield "      </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['row'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            yield "  ";
        } else {
            // line 59
            yield "    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                // line 60
                yield "      <div";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 60), "addClass", [($context["col_classes"] ?? null)], "method", false, false, true, 60), "html", null, true);
                yield ">
        ";
                // line 61
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 61));
                foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                    // line 62
                    yield "          <div";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 62), "addClass", [($context["row_classes"] ?? null)], "method", false, false, true, 62), "html", null, true);
                    yield ">";
                    // line 63
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["row"], "content", [], "any", false, false, true, 63), "html", null, true);
                    // line 64
                    yield "</div>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['row'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 66
                yield "      </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['column'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 68
            yield "  ";
        }
        // line 69
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["options", "view_view__grid_utility_classes", "title", "attributes", "items"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "radix:views-view--grid";
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
        return array (  155 => 69,  152 => 68,  145 => 66,  138 => 64,  136 => 63,  132 => 62,  128 => 61,  123 => 60,  118 => 59,  115 => 58,  108 => 56,  101 => 54,  99 => 53,  95 => 52,  91 => 51,  86 => 50,  81 => 49,  79 => 48,  75 => 47,  72 => 46,  69 => 42,  68 => 40,  66 => 39,  64 => 38,  61 => 37,  59 => 36,  57 => 35,  54 => 34,  52 => 32,  51 => 30,  50 => 29,  49 => 28,  48 => 26,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "radix:views-view--grid", "themes/contrib/radix/components/views-view--grid/views-view--grid.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 26, "if" => 38, "include" => 40, "for" => 49];
        static $filters = ["merge" => 32, "escape" => 47];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'include', 'for'],
                ['merge', 'escape'],
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
