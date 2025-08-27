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

/* xtra:field */
class __TwigTemplate_66f4fc1ef0695a7a827e27d4258e55fe extends Template
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
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.xtra--field"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "xtra:field"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "xtra:field"));
        // line 42
        $_v0 = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 43
            yield "
";
            // line 45
            $context["field_classes"] = Twig\Extension\CoreExtension::merge(["field", ("field--name-" . \Drupal\Component\Utility\Html::getClass(            // line 47
($context["field_name"] ?? null))), ("field--type-" . \Drupal\Component\Utility\Html::getClass(            // line 48
($context["field_type"] ?? null))), ("field--label-" .             // line 49
($context["label_display"] ?? null)), (((            // line 50
($context["label_display"] ?? null) == "inline")) ? ("d-flex") : ("")), (((($tmp =             // line 51
($context["multiple"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("field--items") : ("field--item"))], ((            // line 52
($context["field_utility_classes"] ?? null)) ? ($context["field_utility_classes"]) : ([])));
            // line 54
            yield "
";
            // line 56
            $context["field_title_classes"] = Twig\Extension\CoreExtension::merge(["field__label", (((            // line 58
($context["label_display"] ?? null) == "visually_hidden")) ? ("visually-hidden") : ("")), (((            // line 59
($context["label_display"] ?? null) == "inline")) ? ("me-1") : (""))], ((            // line 60
($context["field_title_utility_classes"] ?? null)) ? ($context["field_title_utility_classes"]) : ([])));
            // line 62
            yield "
";
            // line 63
            if ((($tmp = ($context["label_hidden"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 64
                yield "  ";
                if ((($tmp = ($context["multiple"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 65
                    yield "    <div ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["field_classes"] ?? null)], "method", false, false, true, 65), "html", null, true);
                    yield ">
      ";
                    // line 66
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                        // line 67
                        yield "        <div ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 67), "addClass", ["field__item"], "method", false, false, true, 67), "html", null, true);
                        yield ">";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "content", [], "any", false, false, true, 67), "html", null, true);
                        yield "</div>
      ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 69
                    yield "    </div>
  ";
                } else {
                    // line 71
                    yield "    ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                        // line 72
                        yield "      <div ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["field_classes"] ?? null)], "method", false, false, true, 72), "html", null, true);
                        yield ">";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "content", [], "any", false, false, true, 72), "html", null, true);
                        yield "</div>
    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 74
                    yield "  ";
                }
            } else {
                // line 76
                yield "  <div ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["field_classes"] ?? null)], "method", false, false, true, 76), "html", null, true);
                yield ">
    <div ";
                // line 77
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", [($context["field_title_classes"] ?? null)], "method", false, false, true, 77), "html", null, true);
                yield ">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["label"] ?? null), "html", null, true);
                yield "</div>
    ";
                // line 78
                if ((($tmp = ($context["multiple"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 79
                    yield "      <div class=\"field__items\">
    ";
                }
                // line 81
                yield "
    ";
                // line 82
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 83
                    yield "      <div ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 83), "addClass", ["field__item"], "method", false, false, true, 83), "html", null, true);
                    yield ">";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "content", [], "any", false, false, true, 83), "html", null, true);
                    yield "</div>
    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 85
                yield "
    ";
                // line 86
                if ((($tmp = ($context["multiple"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 87
                    yield "      </div>
    ";
                }
                // line 89
                yield "  </div>
";
            }
            // line 91
            yield "
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 42
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(Twig\Extension\CoreExtension::spaceless($_v0));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["field_name", "field_type", "label_display", "multiple", "field_utility_classes", "field_title_utility_classes", "label_hidden", "attributes", "items", "title_attributes", "label"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "xtra:field";
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
        return array (  174 => 42,  169 => 91,  165 => 89,  161 => 87,  159 => 86,  156 => 85,  145 => 83,  141 => 82,  138 => 81,  134 => 79,  132 => 78,  126 => 77,  121 => 76,  117 => 74,  106 => 72,  101 => 71,  97 => 69,  86 => 67,  82 => 66,  77 => 65,  74 => 64,  72 => 63,  69 => 62,  67 => 60,  66 => 59,  65 => 58,  64 => 56,  61 => 54,  59 => 52,  58 => 51,  57 => 50,  56 => 49,  55 => 48,  54 => 47,  53 => 45,  50 => 43,  48 => 42,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "xtra:field", "themes/custom/xtra/components/field/field.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["apply" => 42, "set" => 45, "if" => 63, "for" => 66];
        static $filters = ["merge" => 52, "clean_class" => 47, "escape" => 65, "spaceless" => 42];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['apply', 'set', 'if', 'for'],
                ['merge', 'clean_class', 'escape', 'spaceless'],
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
