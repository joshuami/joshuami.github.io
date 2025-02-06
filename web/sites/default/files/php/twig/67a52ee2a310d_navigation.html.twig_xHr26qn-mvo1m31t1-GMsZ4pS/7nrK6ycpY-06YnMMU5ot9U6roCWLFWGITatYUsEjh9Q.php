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

/* @navigation/layouts/navigation.html.twig */
class __TwigTemplate_ea584897bbb37d33ef89282c7f6d8b8f extends Template
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
        // line 19
        $context["control_bar_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute();
        // line 20
        yield "
<div ";
        // line 21
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["control_bar_attributes"] ?? null), "addClass", ["admin-toolbar-control-bar"], "method", false, false, true, 21), "setAttribute", ["data-drupal-admin-styles", ""], "method", false, false, true, 21), "html", null, true);
        yield ">
  <div class=\"admin-toolbar-control-bar__content\">
    ";
        // line 23
        yield from $this->loadTemplate("navigation:toolbar-button", "@navigation/layouts/navigation.html.twig", 23)->unwrap()->yield(CoreExtension::toArray(["attributes" => $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(["aria-expanded" => "false", "aria-controls" => "admin-toolbar", "type" => "button"]), "icon" => "burger", "text" => t("Expand sidebar"), "modifiers" => ["small-offset"], "extra_classes" => ["admin-toolbar-control-bar__burger"]]));
        // line 32
        yield "  </div>
</div>

<aside
  ";
        // line 36
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["admin-toolbar"], "method", false, false, true, 36), "setAttribute", ["id", "admin-toolbar"], "method", false, false, true, 36), "setAttribute", ["data-drupal-admin-styles", true], "method", false, false, true, 36), "html", null, true);
        yield "
>
  ";
        // line 39
        yield "  <div class=\"admin-toolbar__displace-placeholder\"></div>

  <div class=\"admin-toolbar__scroll-wrapper\">
    ";
        // line 42
        $context["title_menu"] = \Drupal\Component\Utility\Html::getUniqueId("admin-toolbar-title");
        // line 43
        yield "    ";
        // line 44
        yield "    <nav ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["region_attributes"] ?? null), "content", [], "any", false, false, true, 44), "setAttribute", ["id", "menu-builder"], "method", false, false, true, 44), "addClass", ["admin-toolbar__content"], "method", false, false, true, 44), "setAttribute", ["aria-labelledby", ($context["title_menu"] ?? null)], "method", false, false, true, 44), "html", null, true);
        yield ">
      <h3 id=\"";
        // line 45
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_menu"] ?? null), "html", null, true);
        yield "\" class=\"visually-hidden\">";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Administrative toolbar content"));
        yield "</h3>
      ";
        // line 47
        yield "      <div class=\"admin-toolbar__header\">
        ";
        // line 48
        if ( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "settings", [], "any", false, false, true, 48), "hide_logo", [], "any", false, false, true, 48)) {
            // line 49
            yield "          <a class=\"admin-toolbar__logo\" href=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("<front>"));
            yield "\">
            ";
            // line 50
            if ( !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "settings", [], "any", false, false, true, 50), "logo_path", [], "any", false, false, true, 50))) {
                // line 51
                yield "              <img alt=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Navigation logo"));
                yield "\" src=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "settings", [], "any", false, false, true, 51), "logo_path", [], "any", false, false, true, 51), "html", null, true);
                yield "\" loading=\"eager\" width=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "settings", [], "any", false, true, true, 51), "logo_width", [], "any", true, true, true, 51)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "settings", [], "any", false, false, true, 51), "logo_width", [], "any", false, false, true, 51), 40)) : (40)), "html", null, true);
                yield "\" height=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "settings", [], "any", false, true, true, 51), "logo_height", [], "any", true, true, true, 51)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "settings", [], "any", false, false, true, 51), "logo_height", [], "any", false, false, true, 51), 40)) : (40)), "html", null, true);
                yield "\">
            ";
            } else {
                // line 53
                yield "              ";
                yield from $this->loadTemplate("@navigation/logo.svg.twig", "@navigation/layouts/navigation.html.twig", 53)->unwrap()->yield(CoreExtension::toArray(["label" => t("Navigation logo")]));
                // line 56
                yield "            ";
            }
            // line 57
            yield "          </a>
        ";
        }
        // line 59
        yield "        ";
        yield from $this->loadTemplate("navigation:toolbar-button", "@navigation/layouts/navigation.html.twig", 59)->unwrap()->yield(CoreExtension::toArray(["attributes" => $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(["data-toolbar-back-control" => true, "tabindex" => "-1"]), "extra_classes" => ["admin-toolbar__back-button"], "icon" => "back", "text" => t("Back")]));
        // line 65
        yield "        ";
        yield from $this->loadTemplate("navigation:toolbar-button", "@navigation/layouts/navigation.html.twig", 65)->unwrap()->yield(CoreExtension::toArray(["action" => t("Collapse sidebar"), "attributes" => $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(["aria-controls" => "admin-toolbar", "tabindex" => "-1", "type" => "button"]), "extra_classes" => ["admin-toolbar__close-button"], "icon" => "cross"]));
        // line 71
        yield "      </div>

      ";
        // line 73
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "content_top", [], "any", false, false, true, 73), "html", null, true);
        yield "
      ";
        // line 74
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "content", [], "any", false, false, true, 74), "html", null, true);
        yield "
    </nav>

    ";
        // line 77
        $context["title_menu_footer"] = \Drupal\Component\Utility\Html::getUniqueId("admin-toolbar-footer");
        // line 78
        yield "    <nav ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["region_attributes"] ?? null), "footer", [], "any", false, false, true, 78), "setAttribute", ["id", "menu-footer"], "method", false, false, true, 78), "addClass", ["admin-toolbar__footer"], "method", false, false, true, 78), "setAttribute", ["aria-labelledby", ($context["title_menu_footer"] ?? null)], "method", false, false, true, 78), "html", null, true);
        yield ">
      <h3 id=\"";
        // line 79
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_menu_footer"] ?? null), "html", null, true);
        yield "\" class=\"visually-hidden\">";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Administrative toolbar footer"));
        yield "</h3>
      ";
        // line 80
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "footer", [], "any", false, false, true, 80), "html", null, true);
        yield "
      <button aria-controls=\"admin-toolbar\" class=\"admin-toolbar__expand-button\" type=\"button\">
        <span class=\"visually-hidden\" data-toolbar-text>";
        // line 82
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Collapse sidebar"));
        yield "</span>
      </button>
    </nav>
  </div>
</aside>
<div class=\"admin-toolbar-overlay\" aria-controls=\"admin-toolbar\" data-drupal-admin-styles></div>
<script>
  if (localStorage.getItem('Drupal.navigation.sidebarExpanded') !== 'false' && (window.matchMedia('(min-width: 1024px)').matches)) {
    document.documentElement.setAttribute('data-admin-toolbar', 'expanded');
  }
</script>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "region_attributes", "content"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@navigation/layouts/navigation.html.twig";
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
        return array (  159 => 82,  154 => 80,  148 => 79,  143 => 78,  141 => 77,  135 => 74,  131 => 73,  127 => 71,  124 => 65,  121 => 59,  117 => 57,  114 => 56,  111 => 53,  99 => 51,  97 => 50,  92 => 49,  90 => 48,  87 => 47,  81 => 45,  76 => 44,  74 => 43,  72 => 42,  67 => 39,  62 => 36,  56 => 32,  54 => 23,  49 => 21,  46 => 20,  44 => 19,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@navigation/layouts/navigation.html.twig", "/var/www/html/web/core/modules/navigation/layouts/navigation.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 19, "include" => 23, "if" => 48];
        static $filters = ["escape" => 21, "t" => 26, "clean_unique_id" => 42, "default" => 51];
        static $functions = ["create_attribute" => 19, "path" => 49];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'include', 'if'],
                ['escape', 't', 'clean_unique_id', 'default'],
                ['create_attribute', 'path'],
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
