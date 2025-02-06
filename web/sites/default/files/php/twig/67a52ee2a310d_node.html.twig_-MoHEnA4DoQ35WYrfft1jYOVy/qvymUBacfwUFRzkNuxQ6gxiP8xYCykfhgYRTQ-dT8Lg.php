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

/* themes/contrib/drupal_cms_olivero/templates/content/node.html.twig */
class __TwigTemplate_6eb2afaca23f17a7bfc62fb8aa9928d1 extends Template
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
        // line 62
        yield "
";
        // line 63
        $context["layout"] = ((($context["layout"] ?? null)) ? (("layout--" . \Drupal\Component\Utility\Html::getClass(($context["layout"] ?? null)))) : (""));
        // line 64
        yield "
";
        // line 66
        $context["classes"] = ["node", ("node--type-" . \Drupal\Component\Utility\Html::getClass(CoreExtension::getAttribute($this->env, $this->source,         // line 68
($context["node"] ?? null), "bundle", [], "any", false, false, true, 68))), ((        // line 69
($context["layout"] ?? null)) ? ("grid-full") : ("")), ((CoreExtension::getAttribute($this->env, $this->source,         // line 70
($context["node"] ?? null), "isPromoted", [], "method", false, false, true, 70)) ? ("node--promoted") : ("")), ((CoreExtension::getAttribute($this->env, $this->source,         // line 71
($context["node"] ?? null), "isSticky", [], "method", false, false, true, 71)) ? ("node--sticky") : ("")), (( !CoreExtension::getAttribute($this->env, $this->source,         // line 72
($context["node"] ?? null), "isPublished", [], "method", false, false, true, 72)) ? ("node--unpublished") : ("")), ((        // line 73
($context["view_mode"] ?? null)) ? (("node--view-mode-" . \Drupal\Component\Utility\Html::getClass(($context["view_mode"] ?? null)))) : (""))];
        // line 76
        yield "<article";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 76), "html", null, true);
        yield ">
  <header class=\"";
        // line 77
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["layout"] ?? null), "html", null, true);
        yield "\">
    ";
        // line 78
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield "
    ";
        // line 79
        if ((($context["label"] ?? null) &&  !($context["page"] ?? null))) {
            // line 80
            yield "      <h2";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", ["node__title"], "method", false, false, true, 80), "html", null, true);
            yield ">
        <a href=\"";
            // line 81
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["url"] ?? null), "html", null, true);
            yield "\" rel=\"bookmark\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["label"] ?? null), "html", null, true);
            yield "</a>
      </h2>
    ";
        }
        // line 84
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "
    ";
        // line 85
        if (($context["display_submitted"] ?? null)) {
            // line 86
            yield "      <div class=\"node__meta\">
        <span";
            // line 87
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["author_attributes"] ?? null), "html", null, true);
            yield ">
          ";
            // line 88
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["date"] ?? null), "html", null, true);
            yield "
        </span>
        ";
            // line 90
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["metadata"] ?? null), "html", null, true);
            yield "
      </div>
    ";
        }
        // line 93
        yield "  </header>
  <div";
        // line 94
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", ["node__content", ($context["layout"] ?? null)], "method", false, false, true, 94), "html", null, true);
        yield ">
    ";
        // line 96
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["content"] ?? null), "comment"), "html", null, true);
        yield "
  </div>
  ";
        // line 98
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "comment", [], "any", false, false, true, 98)) {
            // line 99
            yield "    <div id=\"comments\" class=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["layout"] ?? null), "html", null, true);
            yield "\">
      ";
            // line 100
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "comment", [], "any", false, false, true, 100), "html", null, true);
            yield "
    </div>
  ";
        }
        // line 103
        yield "</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["node", "view_mode", "attributes", "title_prefix", "label", "page", "title_attributes", "url", "title_suffix", "display_submitted", "author_attributes", "date", "metadata", "content_attributes", "content"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/contrib/drupal_cms_olivero/templates/content/node.html.twig";
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
        return array (  139 => 103,  133 => 100,  128 => 99,  126 => 98,  120 => 96,  116 => 94,  113 => 93,  107 => 90,  102 => 88,  98 => 87,  95 => 86,  93 => 85,  88 => 84,  80 => 81,  75 => 80,  73 => 79,  69 => 78,  65 => 77,  60 => 76,  58 => 73,  57 => 72,  56 => 71,  55 => 70,  54 => 69,  53 => 68,  52 => 66,  49 => 64,  47 => 63,  44 => 62,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/contrib/drupal_cms_olivero/templates/content/node.html.twig", "/var/www/html/web/themes/contrib/drupal_cms_olivero/templates/content/node.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 63, "if" => 79];
        static $filters = ["clean_class" => 63, "escape" => 76, "without" => 96];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape', 'without'],
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
