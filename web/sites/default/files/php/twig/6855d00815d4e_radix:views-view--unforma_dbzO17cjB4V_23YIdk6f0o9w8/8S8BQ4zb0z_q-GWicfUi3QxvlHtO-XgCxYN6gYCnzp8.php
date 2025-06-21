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

/* radix:views-view--unformatted */
class __TwigTemplate_8ce2c6509d50654773610bca8af6278e extends Template
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
            'views_unformatted_title' => [$this, 'block_views_unformatted_title'],
            'views_unformatted_rows' => [$this, 'block_views_unformatted_rows'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.radix--views-view--unformatted"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "radix:views-view--unformatted"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "radix:views-view--unformatted"));
        // line 18
        yield from $this->unwrap()->yieldBlock('views_unformatted_title', $context, $blocks);
        // line 28
        yield "
";
        // line 29
        yield from $this->unwrap()->yieldBlock('views_unformatted_rows', $context, $blocks);
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["title", "rows", "default_row_class", "row_utility_classes"]);        yield from [];
    }

    // line 18
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_views_unformatted_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 19
        yield "  ";
        if ((($tmp = ($context["title"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 20
            yield "    ";
            // line 21
            yield from $this->load("radix:heading", 21)->unwrap()->yield(CoreExtension::merge($context, ["heading_html_tag" => "h3", "content" =>             // line 23
($context["title"] ?? null)]));
            // line 26
            yield "  ";
        }
        yield from [];
    }

    // line 29
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_views_unformatted_rows(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 30
        yield "  ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 31
            yield "    ";
            // line 32
            $context["row_classes"] = Twig\Extension\CoreExtension::merge([(((($tmp =             // line 33
($context["default_row_class"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("views-row") : (""))], ((            // line 34
($context["row_utility_classes"] ?? null)) ? ($context["row_utility_classes"]) : ([])));
            // line 36
            yield "
    <div";
            // line 37
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 37), "addClass", [($context["row_classes"] ?? null)], "method", false, false, true, 37), "html", null, true);
            yield ">";
            // line 38
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["row"], "content", [], "any", false, false, true, 38), "html", null, true);
            // line 39
            yield "</div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['row'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "radix:views-view--unformatted";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  108 => 39,  106 => 38,  103 => 37,  100 => 36,  98 => 34,  97 => 33,  96 => 32,  94 => 31,  89 => 30,  82 => 29,  76 => 26,  74 => 23,  73 => 21,  71 => 20,  68 => 19,  61 => 18,  55 => 29,  52 => 28,  50 => 18,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "radix:views-view--unformatted", "themes/contrib/radix/components/views-view--unformatted/views-view--unformatted.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["block" => 18, "if" => 19, "include" => 21, "for" => 30, "set" => 32];
        static $filters = ["merge" => 34, "escape" => 37];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['block', 'if', 'include', 'for', 'set'],
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
