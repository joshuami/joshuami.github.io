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

/* radix:pagination */
class __TwigTemplate_048a39c68265e145d6aa9c2c2b9fdcf4 extends Template
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
            'pagination_previous' => [$this, 'block_pagination_previous'],
            'pagination_next' => [$this, 'block_pagination_next'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.radix--pagination"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "radix:pagination"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "radix:pagination"));
        // line 14
        $context["pagination_classes"] = Twig\Extension\CoreExtension::merge(["pagination-wrapper"], ((        // line 16
($context["pagination_utility_classes"] ?? null)) ? ($context["pagination_utility_classes"]) : ([])));
        // line 18
        yield "
";
        // line 19
        $context["pagination_attributes"] = ((($context["attributes"] ?? null)) ? ($context["attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 20
        yield "
";
        // line 22
        $context["alignment_classes"] = ["end" => "justify-content-end", "center" => "justify-content-center", "vertical" => "flex-column", "start" => ""];
        // line 29
        yield "
";
        // line 30
        $context["alignment"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["alignment_classes"] ?? null), ($context["alignment"] ?? null), [], "array", true, true, true, 30) &&  !(null === (($_v0 = ($context["alignment_classes"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0[($context["alignment"] ?? null)] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["alignment_classes"] ?? null), ($context["alignment"] ?? null), [], "array", false, false, true, 30))))) ? ((($_v1 = ($context["alignment_classes"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess && in_array($_v1::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v1[($context["alignment"] ?? null)] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["alignment_classes"] ?? null), ($context["alignment"] ?? null), [], "array", false, false, true, 30))) : (""));
        // line 31
        $context["show_last"] = (((array_key_exists("show_last", $context) &&  !(null === $context["show_last"]))) ? ($context["show_last"]) : (true));
        // line 32
        $context["show_first"] = (((array_key_exists("show_first", $context) &&  !(null === $context["show_first"]))) ? ($context["show_first"]) : (true));
        // line 33
        $context["show_ellipsis"] = (((array_key_exists("show_ellipsis", $context) &&  !(null === $context["show_ellipsis"]))) ? ($context["show_ellipsis"]) : (true));
        // line 34
        yield "
";
        // line 35
        if ((($tmp = ($context["items"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 36
            yield "  <nav ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["pagination_attributes"] ?? null), "addClass", [($context["pagination_classes"] ?? null)], "method", false, false, true, 36), "html", null, true);
            yield " role=\"navigation\" aria-label=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Pagination"));
            yield "\">
    <ul
      class=\"pagination pager__items js-pager__items d-flex flex-wrap ";
            // line 38
            yield (((($tmp = ($context["size"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ("pagination-" . ($context["size"] ?? null)), "html", null, true)) : (""));
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["alignment"] ?? null), "html", null, true);
            yield "\">
      ";
            // line 40
            yield "      ";
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, false, true, 40) && ($context["show_first"] ?? null))) {
                // line 41
                yield "        <li class=\"page-item pager__item pager__item--first\">
          <a href=\"";
                // line 42
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, false, true, 42), "href", [], "any", false, false, true, 42), "html", null, true);
                yield "\" title=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to first page"));
                yield "\" ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, false, true, 42), "attributes", [], "any", false, false, true, 42), "href", "title"), "html", null, true);
                yield " class=\"page-link\">
            <span class=\"visually-hidden\">";
                // line 43
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("First page"));
                yield "</span>
            <span aria-hidden=\"true\">";
                // line 44
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, true, true, 44), "text", [], "any", true, true, true, 44)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, false, true, 44), "text", [], "any", false, false, true, 44), t("« First"))) : (t("« First"))), "html", null, true);
                yield "</span>
          </a>
        </li>
      ";
            }
            // line 48
            yield "
      ";
            // line 50
            yield "      ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 50)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 51
                yield "        <li class=\"page-item pager__item pager__item--previous\">
          ";
                // line 52
                yield from $this->unwrap()->yieldBlock('pagination_previous', $context, $blocks);
                // line 58
                yield "        </li>
      ";
            }
            // line 60
            yield "
      ";
            // line 62
            yield "      ";
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["ellipses"] ?? null), "previous", [], "any", false, false, true, 62) && ($context["show_ellipsis"] ?? null))) {
                // line 63
                yield "        <li class=\"page-item pager__item pager__item--ellipsis disabled\" role=\"presentation\">
          <span class=\"page-link\">&hellip;</span>
        </li>
      ";
            }
            // line 67
            yield "
      ";
            // line 69
            yield "      ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "pages", [], "any", false, false, true, 69));
            foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                // line 70
                yield "        <li class=\"page-item pager__item";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["current"] ?? null) == $context["key"])) ? (" is-active active") : ("")));
                yield "\">
          ";
                // line 71
                if ((($context["current"] ?? null) == $context["key"])) {
                    // line 72
                    yield "            ";
                    $context["title"] = t("Current page");
                    // line 73
                    yield "          ";
                } else {
                    // line 74
                    yield "            ";
                    $context["title"] = t("Go to page @key", ["@key" => $context["key"]]);
                    // line 75
                    yield "          ";
                }
                // line 76
                yield "          <a href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "href", [], "any", false, false, true, 76), "html", null, true);
                yield "\" title=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true);
                yield "\" ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 76), "href", "title"), "html", null, true);
                yield " class=\"page-link\">
            <span class=\"visually-hidden\">
              ";
                // line 78
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["current"] ?? null) == $context["key"])) ? (t("Current page")) : (t("Page"))));
                yield "
            </span>";
                // line 80
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $context["key"], "html", null, true);
                // line 81
                yield "</a>
        </li>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            yield "
      ";
            // line 85
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "current", [], "any", false, false, true, 85) && (CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 85) || CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 85)))) {
                // line 86
                yield "        <li class=\"page-item disabled\">
          <span class=\"page-link\">
            ";
                // line 88
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Page"));
                yield " ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "current", [], "any", false, false, true, 88), "html", null, true);
                yield "
          </span>
        </li>
      ";
            }
            // line 92
            yield "
      ";
            // line 94
            yield "      ";
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["ellipses"] ?? null), "next", [], "any", false, false, true, 94) && ($context["show_ellipsis"] ?? null))) {
                // line 95
                yield "        <li class=\"page-item pager__item pager__item--ellipsis disabled\" role=\"presentation\">
          <span class=\"page-link\">&hellip;</span>
        </li>
      ";
            }
            // line 99
            yield "
      ";
            // line 101
            yield "      ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 101)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 102
                yield "        <li class=\"page-item pager__item pager__item--next\">
          ";
                // line 103
                yield from $this->unwrap()->yieldBlock('pagination_next', $context, $blocks);
                // line 109
                yield "        </li>
      ";
            }
            // line 111
            yield "
      ";
            // line 113
            yield "      ";
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, false, true, 113) && ($context["show_last"] ?? null))) {
                // line 114
                yield "        <li class=\"page-item pager__item pager__item--last\">
          <a href=\"";
                // line 115
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, false, true, 115), "href", [], "any", false, false, true, 115), "html", null, true);
                yield "\" title=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to last page"));
                yield "\" ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, false, true, 115), "attributes", [], "any", false, false, true, 115), "href", "title"), "html", null, true);
                yield " class=\"page-link\">
            <span class=\"visually-hidden\">";
                // line 116
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Last page"));
                yield "</span>
            <span aria-hidden=\"true\">";
                // line 117
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, true, true, 117), "text", [], "any", true, true, true, 117)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, false, true, 117), "text", [], "any", false, false, true, 117), t("Last »"))) : (t("Last »"))), "html", null, true);
                yield "</span>
          </a>
        </li>
      ";
            }
            // line 121
            yield "    </ul>
  </nav>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["pagination_utility_classes", "attributes", "items", "size", "ellipses", "current"]);        yield from [];
    }

    // line 52
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_pagination_previous(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 53
        yield "            <a href=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 53), "href", [], "any", false, false, true, 53), "html", null, true);
        yield "\" title=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to previous page"));
        yield "\" rel=\"prev\" ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 53), "attributes", [], "any", false, false, true, 53), "href", "title", "rel"), "html", null, true);
        yield " class=\"page-link\">
              <span class=\"visually-hidden\">";
        // line 54
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Previous page"));
        yield "</span>
              <span aria-hidden=\"true\">";
        // line 55
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, true, true, 55), "text", [], "any", true, true, true, 55)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 55), "text", [], "any", false, false, true, 55), t("‹ Previous"))) : (t("‹ Previous"))), "html", null, true);
        yield "</span>
            </a>
          ";
        yield from [];
    }

    // line 103
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_pagination_next(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 104
        yield "            <a href=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 104), "href", [], "any", false, false, true, 104), "html", null, true);
        yield "\" title=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to next page"));
        yield "\" rel=\"next\" ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 104), "attributes", [], "any", false, false, true, 104), "href", "title", "rel"), "html", null, true);
        yield " class=\"page-link\">
              <span class=\"visually-hidden\">";
        // line 105
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Next page"));
        yield "</span>
              <span aria-hidden=\"true\">";
        // line 106
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, true, true, 106), "text", [], "any", true, true, true, 106)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 106), "text", [], "any", false, false, true, 106), t("Next ›"))) : (t("Next ›"))), "html", null, true);
        yield "</span>
            </a>
          ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "radix:pagination";
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
        return array (  326 => 106,  322 => 105,  313 => 104,  306 => 103,  298 => 55,  294 => 54,  285 => 53,  278 => 52,  269 => 121,  262 => 117,  258 => 116,  250 => 115,  247 => 114,  244 => 113,  241 => 111,  237 => 109,  235 => 103,  232 => 102,  229 => 101,  226 => 99,  220 => 95,  217 => 94,  214 => 92,  205 => 88,  201 => 86,  199 => 85,  196 => 84,  188 => 81,  186 => 80,  182 => 78,  172 => 76,  169 => 75,  166 => 74,  163 => 73,  160 => 72,  158 => 71,  153 => 70,  148 => 69,  145 => 67,  139 => 63,  136 => 62,  133 => 60,  129 => 58,  127 => 52,  124 => 51,  121 => 50,  118 => 48,  111 => 44,  107 => 43,  99 => 42,  96 => 41,  93 => 40,  87 => 38,  79 => 36,  77 => 35,  74 => 34,  72 => 33,  70 => 32,  68 => 31,  66 => 30,  63 => 29,  61 => 22,  58 => 20,  56 => 19,  53 => 18,  51 => 16,  50 => 14,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "radix:pagination", "themes/contrib/radix/components/pagination/pagination.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 14, "if" => 35, "block" => 52, "for" => 69];
        static $filters = ["merge" => 16, "escape" => 36, "t" => 36, "without" => 42, "default" => 44];
        static $functions = ["create_attribute" => 19];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block', 'for'],
                ['merge', 'escape', 't', 'without', 'default'],
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
