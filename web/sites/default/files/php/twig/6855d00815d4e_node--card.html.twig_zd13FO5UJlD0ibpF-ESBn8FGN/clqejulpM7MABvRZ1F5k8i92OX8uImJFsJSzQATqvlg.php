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

/* themes/custom/xtra/templates/content/node--card.html.twig */
class __TwigTemplate_d60010340fcc1789ebdecf9752b30a0d extends Template
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
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_short_title", [], "any", false, false, true, 1)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 2
            yield "  ";
            $context["title"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_short_title", [], "any", false, false, true, 2), 0, [], "any", false, false, true, 2);
        } else {
            // line 4
            yield "  ";
            $context["title"] = CoreExtension::getAttribute($this->env, $this->source, ($context["label"] ?? null), 0, [], "any", false, false, true, 4);
        }
        // line 6
        yield "
";
        // line 7
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "bundle", [], "any", false, false, true, 7) == "resource")) {
            // line 8
            yield "  ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_resource_url", [], "any", false, false, true, 8), 0, [], "any", false, false, true, 8), "url", [], "any", false, false, true, 8), "external", [], "any", false, false, true, 8)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 9
                yield "    ";
                $context["destination"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_resource_url", [], "any", false, false, true, 9), "uri", [], "any", false, false, true, 9);
                // line 10
                yield "  ";
            } else {
                // line 11
                yield "    ";
                $context["destination"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_resource_url", [], "any", false, false, true, 11), 0, [], "any", false, false, true, 11), "url", [], "any", false, false, true, 11), "routeName", [], "any", false, false, true, 11), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_resource_url", [], "any", false, false, true, 11), 0, [], "any", false, false, true, 11), "url", [], "any", false, false, true, 11), "routeParameters", [], "any", false, false, true, 11));
                // line 12
                yield "  ";
            }
        } else {
            // line 14
            yield "  ";
            $context["destination"] = ($context["url"] ?? null);
        }
        // line 16
        yield "
";
        // line 18
        $context["link_classes"] = ["stretched-link", \Drupal\Component\Utility\Html::getClass(CoreExtension::getAttribute($this->env, $this->source,         // line 20
($context["node"] ?? null), "bundle", [], "any", false, false, true, 20)), "link-light", "link-offset-2", "link-underline-opacity-25", "link-underline-opacity-100-hover"];
        // line 27
        yield "
<div class=\"card bg-primary bg-gradient border-4 border-primary-subtle rounded-4 h-100\">
  ";
        // line 29
        if ((($tmp = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_featured_image", [], "any", false, false, true, 29))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 30
            yield "  <div class=\"img-fluid text-center\" style=\"object-fit: cover;\">
    ";
            // line 31
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_featured_image", [], "any", false, false, true, 31), "html", null, true);
            yield "
  </div>
  ";
        } else {
            // line 34
            yield "  <div class=\"img-fluid text-center d-none d-sm-none d-md-block\" style=\"object-fit: cover;\">
    ";
            // line 35
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalEntity("media", 77891, "featured"), "html", null, true);
            yield "
  </div>
  ";
        }
        // line 38
        yield "  <div class=\"card-body\">
    <h3 class=\"mb-1\">
      <a href=\"";
        // line 40
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["destination"] ?? null), "html", null, true);
        yield "\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["link_classes"] ?? null)], "method", false, false, true, 40), "removeClass", ["contextual-region"], "method", false, false, true, 40), "html", null, true);
        yield ">";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true);
        yield "</a>
    </h3>
    <div class=\"card-text text-light\">
      ";
        // line 43
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["content"] ?? null), "field_short_title", "field_featured_image", "field_resource_url"), "html", null, true);
        yield "
    </div>
  </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["content", "label", "node", "url", "attributes"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/xtra/templates/content/node--card.html.twig";
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
        return array (  123 => 43,  113 => 40,  109 => 38,  103 => 35,  100 => 34,  94 => 31,  91 => 30,  89 => 29,  85 => 27,  83 => 20,  82 => 18,  79 => 16,  75 => 14,  71 => 12,  68 => 11,  65 => 10,  62 => 9,  59 => 8,  57 => 7,  54 => 6,  50 => 4,  46 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/xtra/templates/content/node--card.html.twig", "/var/www/html/web/themes/custom/xtra/templates/content/node--card.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 1, "set" => 2];
        static $filters = ["clean_class" => 20, "render" => 29, "escape" => 31, "without" => 43];
        static $functions = ["path" => 11, "drupal_entity" => 35];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set'],
                ['clean_class', 'render', 'escape', 'without'],
                ['path', 'drupal_entity'],
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
