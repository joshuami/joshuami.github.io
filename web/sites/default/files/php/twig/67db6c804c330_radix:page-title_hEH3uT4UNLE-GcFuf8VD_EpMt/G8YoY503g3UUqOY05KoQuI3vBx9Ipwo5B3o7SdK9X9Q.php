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

/* radix:page-title */
class __TwigTemplate_fb16c808c0069eb063c7ab1f53f4f755 extends Template
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
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.radix--page-title"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "radix:page-title"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "radix:page-title"));
        // line 24
        $context["page_title_classes"] = Twig\Extension\CoreExtension::merge(["title", "page-title"], ((        // line 27
($context["page_title_utility_classes"] ?? null)) ? ($context["page_title_utility_classes"]) : ([])));
        // line 29
        yield "
";
        // line 30
        $context["title_attributes"] = ((($context["title_attributes"] ?? null)) ? ($context["title_attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 31
        yield "
";
        // line 32
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield "

";
        // line 34
        if (Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(($context["title"] ?? null))))) {
            // line 35
            yield "  ";
            // line 36
            yield from $this->loadTemplate("radix:heading", "radix:page-title", 36)->unwrap()->yield(CoreExtension::toArray(["heading_html_tag" => "h1", "content" =>             // line 38
($context["title"] ?? null), "display" => ((            // line 39
array_key_exists("display", $context)) ? (Twig\Extension\CoreExtension::default(($context["display"] ?? null), "")) : ("")), "heading_utility_classes" =>             // line 40
($context["page_title_classes"] ?? null)]));
        }
        // line 44
        yield "
";
        // line 45
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page_title_utility_classes", "title_prefix", "title", "display", "title_suffix"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "radix:page-title";
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
        return array (  77 => 45,  74 => 44,  71 => 40,  70 => 39,  69 => 38,  68 => 36,  66 => 35,  64 => 34,  59 => 32,  56 => 31,  54 => 30,  51 => 29,  49 => 27,  48 => 24,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "radix:page-title", "themes/contrib/radix/components/page-title/page-title.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 24, "if" => 34, "include" => 36];
        static $filters = ["merge" => 27, "escape" => 32, "trim" => 34, "striptags" => 34, "render" => 34, "default" => 39];
        static $functions = ["create_attribute" => 30];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'include'],
                ['merge', 'escape', 'trim', 'striptags', 'render', 'default'],
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
