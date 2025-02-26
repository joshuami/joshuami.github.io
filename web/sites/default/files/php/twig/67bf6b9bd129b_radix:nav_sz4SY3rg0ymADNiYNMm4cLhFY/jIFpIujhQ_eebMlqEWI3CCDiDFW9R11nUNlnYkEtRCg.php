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

/* radix:nav */
class __TwigTemplate_6d5eb913fb383b6464133088af16e8d8 extends Template
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
            'nav_items' => [$this, 'block_nav_items'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.radix--nav"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "radix:nav"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "radix:nav"));
        // line 15
        $macros["menus"] = $this->macros["menus"] = $this;
        // line 17
        $context["alignment_classes"] = ["right" => "justify-content-end", "center" => "justify-content-center", "vertical" => "flex-column", "left" => ""];
        // line 24
        yield "
";
        // line 25
        $context["alignment"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["alignment_classes"] ?? null), ($context["alignment"] ?? null), [], "array", true, true, true, 25) &&  !(null === (($_v0 = ($context["alignment_classes"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0[($context["alignment"] ?? null)] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["alignment_classes"] ?? null), ($context["alignment"] ?? null), [], "array", false, false, true, 25))))) ? ((($_v1 = ($context["alignment_classes"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess && in_array($_v1::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v1[($context["alignment"] ?? null)] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["alignment_classes"] ?? null), ($context["alignment"] ?? null), [], "array", false, false, true, 25))) : (""));
        // line 26
        $context["dropdown_direction"] = (((array_key_exists("dropdown_direction", $context) &&  !(null === $context["dropdown_direction"]))) ? ($context["dropdown_direction"]) : ("dropend"));
        // line 27
        $context["style"] = ((($context["style"] ?? null)) ? (("nav-" . ($context["style"] ?? null))) : (""));
        // line 28
        $context["fill"] = ((($context["fill"] ?? null)) ? (("nav-" . ($context["fill"] ?? null))) : (""));
        // line 29
        yield "
";
        // line 31
        $context["nav_classes"] = Twig\Extension\CoreExtension::merge(["nav",         // line 33
($context["style"] ?? null),         // line 34
($context["alignment"] ?? null),         // line 35
($context["fill"] ?? null)], ((        // line 36
($context["nav_utility_classes"] ?? null)) ? ($context["nav_utility_classes"]) : ([])));
        // line 38
        yield "
";
        // line 39
        if (($context["items"] ?? null)) {
            // line 40
            yield "  <ul ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["nav_classes"] ?? null)], "method", false, false, true, 40), "html", null, true);
            yield ">
    ";
            // line 41
            yield from $this->unwrap()->yieldBlock('nav_items', $context, $blocks);
            // line 75
            yield "  </ul>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["_self", "nav_utility_classes", "items", "attributes", "nav_item_utility_classes", "nav_link_utility_classes"]);        yield from [];
    }

    // line 41
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_nav_items(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 42
        yield "      ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 43
            yield "        ";
            // line 44
            $context["nav_item_classes"] = Twig\Extension\CoreExtension::merge(["nav-item", ((CoreExtension::getAttribute($this->env, $this->source,             // line 46
$context["item"], "in_active_trail", [], "any", false, false, true, 46)) ? ("active") : ("")), (((CoreExtension::getAttribute($this->env, $this->source,             // line 47
$context["item"], "is_expanded", [], "any", false, false, true, 47) && CoreExtension::getAttribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 47))) ? ("dropdown") : (""))], ((            // line 48
($context["nav_item_utility_classes"] ?? null)) ? ($context["nav_item_utility_classes"]) : ([])));
            // line 50
            yield "        ";
            // line 51
            $context["nav_link_classes"] = Twig\Extension\CoreExtension::merge(["nav-link", ((CoreExtension::getAttribute($this->env, $this->source,             // line 53
$context["item"], "in_active_trail", [], "any", false, false, true, 53)) ? ("active") : (""))], ((            // line 54
($context["nav_link_utility_classes"] ?? null)) ? ($context["nav_link_utility_classes"]) : ([])));
            // line 56
            yield "        ";
            if (is_iterable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 56), "options", [], "any", false, false, true, 56), "attributes", [], "any", false, false, true, 56), "class", [], "any", false, false, true, 56))) {
                // line 57
                yield "          ";
                $context["nav_link_classes"] = Twig\Extension\CoreExtension::merge(($context["nav_link_classes"] ?? null), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 57), "options", [], "any", false, false, true, 57), "attributes", [], "any", false, false, true, 57), "class", [], "any", false, false, true, 57));
                // line 58
                yield "        ";
            } elseif (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 58), "options", [], "any", false, false, true, 58), "attributes", [], "any", false, false, true, 58), "class", [], "any", false, false, true, 58)) {
                // line 59
                yield "          ";
                $context["nav_link_classes"] = Twig\Extension\CoreExtension::merge(($context["nav_link_classes"] ?? null), [CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 59), "options", [], "any", false, false, true, 59), "attributes", [], "any", false, false, true, 59), "class", [], "any", false, false, true, 59)]);
                // line 60
                yield "        ";
            }
            // line 61
            yield "        <li";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 61), "addClass", [($context["nav_item_classes"] ?? null)], "method", false, false, true, 61), "html", null, true);
            yield ">
          ";
            // line 62
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "is_expanded", [], "any", false, false, true, 62) && CoreExtension::getAttribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 62))) {
                // line 63
                yield "            ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 63), CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 63), ["class" => Twig\Extension\CoreExtension::merge(($context["nav_link_classes"] ?? null), ["dropdown-toggle"]), "data-bs-toggle" => "dropdown", "data-bs-auto-close" => "outside", "aria-expanded" => "false"]), "html", null, true);
                yield "
            ";
                // line 65
                yield from $this->loadTemplate("radix:dropdown-menu", "radix:nav", 65)->unwrap()->yield(CoreExtension::merge($context, ["items" => CoreExtension::getAttribute($this->env, $this->source,                 // line 66
$context["item"], "below", [], "any", false, false, true, 66)]));
                // line 69
                yield "          ";
            } elseif (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 69)) {
                // line 70
                yield "            ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 70), CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 70), ["class" => ($context["nav_link_classes"] ?? null)]), "html", null, true);
                yield "
          ";
            }
            // line 72
            yield "        </li>
      ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        yield "    ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "radix:nav";
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
        return array (  185 => 74,  170 => 72,  164 => 70,  161 => 69,  159 => 66,  158 => 65,  153 => 63,  151 => 62,  146 => 61,  143 => 60,  140 => 59,  137 => 58,  134 => 57,  131 => 56,  129 => 54,  128 => 53,  127 => 51,  125 => 50,  123 => 48,  122 => 47,  121 => 46,  120 => 44,  118 => 43,  100 => 42,  93 => 41,  85 => 75,  83 => 41,  78 => 40,  76 => 39,  73 => 38,  71 => 36,  70 => 35,  69 => 34,  68 => 33,  67 => 31,  64 => 29,  62 => 28,  60 => 27,  58 => 26,  56 => 25,  53 => 24,  51 => 17,  49 => 15,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "radix:nav", "themes/contrib/radix/components/nav/nav.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["import" => 15, "set" => 17, "if" => 39, "block" => 41, "for" => 42, "include" => 65];
        static $filters = ["merge" => 36, "escape" => 40];
        static $functions = ["link" => 63];

        try {
            $this->sandbox->checkSecurity(
                ['import', 'set', 'if', 'block', 'for', 'include'],
                ['merge', 'escape'],
                ['link'],
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
