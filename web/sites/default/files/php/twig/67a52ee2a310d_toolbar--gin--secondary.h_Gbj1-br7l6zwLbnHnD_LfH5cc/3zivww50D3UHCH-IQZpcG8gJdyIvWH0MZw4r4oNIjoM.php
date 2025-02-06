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

/* themes/contrib/gin/templates/navigation/toolbar--gin--secondary.html.twig */
class __TwigTemplate_0e40332e5246c4fd060257158e1dbe59 extends Template
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
        // line 23
        yield "
";
        // line 25
        try {
            $_v0 = $this->loadTemplate("@gin/navigation/fix-toolbar-js-error.html.twig", "themes/contrib/gin/templates/navigation/toolbar--gin--secondary.html.twig", 25);
        } catch (LoaderError $e) {
            // ignore missing template
            $_v0 = null;
        }
        if ($_v0) {
            yield from $_v0->unwrap()->yield(CoreExtension::merge($context, ["toolbar_variant" =>             // line 26
($context["toolbar_variant"] ?? null), "core_navigation" =>             // line 27
($context["core_navigation"] ?? null)]));
        }
        // line 29
        yield "
";
        // line 31
        if ((($_v1 = (($_v2 = $context) && is_array($_v2) || $_v2 instanceof ArrayAccess && in_array($_v2::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v2["#secondary"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context, "#secondary", [], "array", false, false, true, 31))) && is_array($_v1) || $_v1 instanceof ArrayAccess && in_array($_v1::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v1["tabs"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, (($_v3 = $context) && is_array($_v3) || $_v3 instanceof ArrayAccess && in_array($_v3::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v3["#secondary"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context, "#secondary", [], "array", false, false, true, 31)), "tabs", [], "array", false, false, true, 31))) {
            // line 32
            yield "  ";
            $context["tabs"] = (($_v4 = (($_v5 = $context) && is_array($_v5) || $_v5 instanceof ArrayAccess && in_array($_v5::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v5["#secondary"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context, "#secondary", [], "array", false, false, true, 32))) && is_array($_v4) || $_v4 instanceof ArrayAccess && in_array($_v4::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v4["tabs"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, (($_v6 = $context) && is_array($_v6) || $_v6 instanceof ArrayAccess && in_array($_v6::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v6["#secondary"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context, "#secondary", [], "array", false, false, true, 32)), "tabs", [], "array", false, false, true, 32));
        }
        // line 34
        if ((($_v7 = (($_v8 = $context) && is_array($_v8) || $_v8 instanceof ArrayAccess && in_array($_v8::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v8["#secondary"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context, "#secondary", [], "array", false, false, true, 34))) && is_array($_v7) || $_v7 instanceof ArrayAccess && in_array($_v7::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v7["trays"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, (($_v9 = $context) && is_array($_v9) || $_v9 instanceof ArrayAccess && in_array($_v9::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v9["#secondary"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context, "#secondary", [], "array", false, false, true, 34)), "trays", [], "array", false, false, true, 34))) {
            // line 35
            yield "  ";
            $context["trays"] = (($_v10 = (($_v11 = $context) && is_array($_v11) || $_v11 instanceof ArrayAccess && in_array($_v11::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v11["#secondary"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context, "#secondary", [], "array", false, false, true, 35))) && is_array($_v10) || $_v10 instanceof ArrayAccess && in_array($_v10::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v10["trays"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, (($_v12 = $context) && is_array($_v12) || $_v12 instanceof ArrayAccess && in_array($_v12::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v12["#secondary"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context, "#secondary", [], "array", false, false, true, 35)), "trays", [], "array", false, false, true, 35));
        }
        // line 37
        yield "
<div";
        // line 38
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["toolbar", "toolbar-secondary"], "method", false, false, true, 38), "setAttribute", ["id", "toolbar-administration-secondary"], "method", false, false, true, 38), "html", null, true);
        yield ">
  <nav";
        // line 39
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["toolbar_attributes"] ?? null), "addClass", ["toolbar-bar", "clearfix"], "method", false, false, true, 39), "setAttribute", ["id", "toolbar-bar"], "method", false, false, true, 39), "html", null, true);
        yield ">
    <h2 class=\"visually-hidden\">";
        // line 40
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["toolbar_heading"] ?? null), "html", null, true);
        yield "</h2>

    ";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["tabs"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["tab"]) {
            // line 43
            yield "      ";
            $context["tray"] = (($_v13 = ($context["trays"] ?? null)) && is_array($_v13) || $_v13 instanceof ArrayAccess && in_array($_v13::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v13[$context["key"]] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["trays"] ?? null), $context["key"], [], "array", false, false, true, 43));
            // line 44
            yield "      ";
            $context["user_menu"] = (((($_v14 = CoreExtension::getAttribute($this->env, $this->source, ($context["tray"] ?? null), "links", [], "any", false, false, true, 44)) && is_array($_v14) || $_v14 instanceof ArrayAccess && in_array($_v14::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v14["user_links"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["tray"] ?? null), "links", [], "any", false, false, true, 44), "user_links", [], "array", false, false, true, 44))) ? ("user-menu") : (false));
            // line 45
            yield "      ";
            $context["item_id"] = [];
            // line 46
            yield "
      ";
            // line 47
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((($_v15 = (($_v16 = CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "link", [], "any", false, false, true, 47)) && is_array($_v16) || $_v16 instanceof ArrayAccess && in_array($_v16::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v16["#attributes"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "link", [], "any", false, false, true, 47), "#attributes", [], "array", false, false, true, 47))) && is_array($_v15) || $_v15 instanceof ArrayAccess && in_array($_v15::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v15["class"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, (($_v17 = CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "link", [], "any", false, false, true, 47)) && is_array($_v17) || $_v17 instanceof ArrayAccess && in_array($_v17::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v17["#attributes"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "link", [], "any", false, false, true, 47), "#attributes", [], "array", false, false, true, 47)), "class", [], "array", false, false, true, 47)));
            foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                // line 48
                yield "        ";
                if (CoreExtension::inFilter("icon-", $context["item"])) {
                    // line 49
                    yield "          ";
                    $context["item_id"] = Twig\Extension\CoreExtension::merge(($context["item_id"] ?? null), [("toolbar-id--" . $context["item"])]);
                    // line 50
                    yield "        ";
                }
                // line 51
                yield "      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 52
            yield "
      ";
            // line 53
            $context["tab_id"] = (((($_v18 = CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "link", [], "any", false, false, true, 53)) && is_array($_v18) || $_v18 instanceof ArrayAccess && in_array($_v18::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v18["#id"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "link", [], "any", false, false, true, 53), "#id", [], "array", false, false, true, 53))) ? (("toolbar-tab--" . (($_v19 = CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "link", [], "any", false, false, true, 53)) && is_array($_v19) || $_v19 instanceof ArrayAccess && in_array($_v19::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v19["#id"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "link", [], "any", false, false, true, 53), "#id", [], "array", false, false, true, 53)))) : (""));
            // line 54
            yield "      ";
            $context["tab_classes"] = Twig\Extension\CoreExtension::merge(($context["item_id"] ?? null), ["toolbar-tab", ($context["user_menu"] ?? null), ($context["tab_id"] ?? null)]);
            // line 55
            yield "
      ";
            // line 56
            $context["denylist_items"] = ["toolbar-id--toolbar-icon-menu"];
            // line 59
            yield "
      ";
            // line 61
            yield "      ";
            if (!CoreExtension::inFilter((($_v20 = ($context["item_id"] ?? null)) && is_array($_v20) || $_v20 instanceof ArrayAccess && in_array($_v20::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v20[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["item_id"] ?? null), 0, [], "array", false, false, true, 61)), ($context["denylist_items"] ?? null))) {
                // line 62
                yield "        <div";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "attributes", [], "any", false, false, true, 62), "addClass", [($context["tab_classes"] ?? null)], "method", false, false, true, 62), "html", null, true);
                if (CoreExtension::inFilter("tour-toolbar-tab", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "attributes", [], "any", false, false, true, 62), "class", [], "any", false, false, true, 62))) {
                    yield " id=\"toolbar-tab-tour\"";
                }
                yield ">
          ";
                // line 63
                if (((($_v21 = ($context["item_id"] ?? null)) && is_array($_v21) || $_v21 instanceof ArrayAccess && in_array($_v21::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v21[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["item_id"] ?? null), 0, [], "array", false, false, true, 63)) == "toolbar-id--toolbar-icon-user")) {
                    // line 64
                    yield "            ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["user_picture"] ?? null), "html", null, true);
                    yield "
          ";
                } else {
                    // line 66
                    yield "            ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "link", [], "any", false, false, true, 66), "html", null, true);
                    yield "
          ";
                }
                // line 68
                yield "          <div";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["tray"] ?? null), "attributes", [], "any", false, false, true, 68), "html", null, true);
                yield ">
            ";
                // line 69
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["tray"] ?? null), "label", [], "any", false, false, true, 69)) {
                    // line 70
                    yield "              <nav class=\"toolbar-lining clearfix\" role=\"navigation\" aria-label=\"";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["tray"] ?? null), "label", [], "any", false, false, true, 70), "html", null, true);
                    yield "\">
                <h3 class=\"toolbar-tray-name visually-hidden\">";
                    // line 71
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["tray"] ?? null), "label", [], "any", false, false, true, 71), "html", null, true);
                    yield "</h3>
            ";
                } else {
                    // line 73
                    yield "              <nav class=\"toolbar-lining clearfix\" role=\"navigation\">
            ";
                }
                // line 75
                yield "            ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["tray"] ?? null), "links", [], "any", false, false, true, 75), "html", null, true);
                yield "
            </nav>
          </div>
        </div>
      ";
            }
            // line 80
            yield "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['key'], $context['tab'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        yield "  </nav>
  ";
        // line 82
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["remainder"] ?? null), "html", null, true);
        yield "
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["toolbar_variant", "core_navigation", "_context", "attributes", "toolbar_attributes", "toolbar_heading", "user_picture", "remainder"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/contrib/gin/templates/navigation/toolbar--gin--secondary.html.twig";
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
        return array (  205 => 82,  202 => 81,  196 => 80,  187 => 75,  183 => 73,  178 => 71,  173 => 70,  171 => 69,  166 => 68,  160 => 66,  154 => 64,  152 => 63,  144 => 62,  141 => 61,  138 => 59,  136 => 56,  133 => 55,  130 => 54,  128 => 53,  125 => 52,  119 => 51,  116 => 50,  113 => 49,  110 => 48,  106 => 47,  103 => 46,  100 => 45,  97 => 44,  94 => 43,  90 => 42,  85 => 40,  81 => 39,  77 => 38,  74 => 37,  70 => 35,  68 => 34,  64 => 32,  62 => 31,  59 => 29,  56 => 27,  55 => 26,  47 => 25,  44 => 23,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/contrib/gin/templates/navigation/toolbar--gin--secondary.html.twig", "/var/www/html/web/themes/contrib/gin/templates/navigation/toolbar--gin--secondary.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["include" => 25, "if" => 31, "set" => 32, "for" => 42];
        static $filters = ["escape" => 38, "merge" => 49];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['include', 'if', 'set', 'for'],
                ['escape', 'merge'],
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
