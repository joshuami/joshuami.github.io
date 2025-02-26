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

/* xtra:page */
class __TwigTemplate_2a3b60c72b72acc8f431d039dcce70ae extends Template
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
            'alerts' => [$this, 'block_alerts'],
            'page_navigation' => [$this, 'block_page_navigation'],
            'page_content' => [$this, 'block_page_content'],
            'page_footer' => [$this, 'block_page_footer'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.xtra--page"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "xtra:page"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "xtra:page"));
        // line 7
        $context["page_attributes"] = ((($context["page_attributes"] ?? null)) ? ($context["page_attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 8
        $context["page_classes"] = Twig\Extension\CoreExtension::merge(["page"], ((        // line 11
($context["page_utility_classes"] ?? null)) ? (($context["page_utility_classes"] ?? null)) : ([])));
        // line 13
        yield from $this->unwrap()->yieldBlock('alerts', $context, $blocks);
        // line 18
        yield "<div ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page_attributes"] ?? null), "addClass", [($context["page_classes"] ?? null)], "method", false, false, true, 18), "html", null, true);
        yield ">
  ";
        // line 19
        yield from $this->unwrap()->yieldBlock('page_navigation', $context, $blocks);
        // line 22
        yield "
  ";
        // line 23
        yield from $this->unwrap()->yieldBlock('page_content', $context, $blocks);
        // line 26
        yield "
  ";
        // line 27
        yield from $this->unwrap()->yieldBlock('page_footer', $context, $blocks);
        // line 30
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page_utility_classes", "page"]);        yield from [];
    }

    // line 13
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_alerts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 14
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "alerts", [], "any", false, false, true, 14)) {
            // line 15
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "alerts", [], "any", false, false, true, 15), "html", null, true);
            yield "
";
        }
        yield from [];
    }

    // line 19
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_navigation(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 20
        yield "    ";
        yield from $this->loadTemplate("xtra:page-navigation", "xtra:page", 20)->unwrap()->yield($context);
        // line 21
        yield "  ";
        yield from [];
    }

    // line 23
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 24
        yield "    ";
        yield from $this->loadTemplate("xtra:page-content", "xtra:page", 24)->unwrap()->yield($context);
        // line 25
        yield "  ";
        yield from [];
    }

    // line 27
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 28
        yield "    ";
        yield from $this->loadTemplate("xtra:page-footer", "xtra:page", 28)->unwrap()->yield($context);
        // line 29
        yield "  ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "xtra:page";
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
        return array (  141 => 29,  138 => 28,  131 => 27,  126 => 25,  123 => 24,  116 => 23,  111 => 21,  108 => 20,  101 => 19,  92 => 15,  90 => 14,  83 => 13,  76 => 30,  74 => 27,  71 => 26,  69 => 23,  66 => 22,  64 => 19,  59 => 18,  57 => 13,  55 => 11,  54 => 8,  52 => 7,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "xtra:page", "themes/custom/xtra/components/page/page.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 7, "block" => 13, "if" => 14, "include" => 20];
        static $filters = ["merge" => 11, "escape" => 18];
        static $functions = ["create_attribute" => 7];

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
