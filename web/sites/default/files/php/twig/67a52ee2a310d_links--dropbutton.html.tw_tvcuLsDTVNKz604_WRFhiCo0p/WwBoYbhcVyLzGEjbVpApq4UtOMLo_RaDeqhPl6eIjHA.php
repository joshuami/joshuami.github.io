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

/* themes/contrib/gin/templates/form/links--dropbutton.html.twig */
class __TwigTemplate_e966216de010fba5264db0827582a057 extends Template
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
        // line 34
        if (($context["links"] ?? null)) {
            // line 35
            if (($context["heading"] ?? null)) {
                // line 36
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["heading"] ?? null), "level", [], "any", false, false, true, 36)) {
                    // line 37
                    yield "<";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["heading"] ?? null), "level", [], "any", false, false, true, 37), "html", null, true);
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["heading"] ?? null), "attributes", [], "any", false, false, true, 37), "html", null, true);
                    yield ">";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["heading"] ?? null), "text", [], "any", false, false, true, 37), "html", null, true);
                    yield "</";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["heading"] ?? null), "level", [], "any", false, false, true, 37), "html", null, true);
                    yield ">";
                } else {
                    // line 39
                    yield "<h2";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["heading"] ?? null), "attributes", [], "any", false, false, true, 39), "html", null, true);
                    yield ">";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["heading"] ?? null), "text", [], "any", false, false, true, 39), "html", null, true);
                    yield "</h2>";
                }
            }
            // line 42
            yield "<ul";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["dropbutton--gin"], "method", false, false, true, 42), "html", null, true);
            yield ">";
            // line 43
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["links"] ?? null));
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
                // line 44
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 44) == 2)) {
                    // line 45
                    yield "      <li class=\"dropbutton__item\">
        <ul class=\"dropbutton__items\">
      ";
                }
                // line 48
                yield "      <li";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 48), "addClass", ["dropbutton__item"], "method", false, false, true, 48), "html", null, true);
                yield ">";
                // line 49
                if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, true, 49)) {
                    // line 50
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, true, 50), "html", null, true);
                } elseif (CoreExtension::getAttribute($this->env, $this->source,                 // line 51
$context["item"], "text_attributes", [], "any", false, false, true, 51)) {
                    // line 52
                    yield "<span";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "text_attributes", [], "any", false, false, true, 52), "html", null, true);
                    yield ">";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "text", [], "any", false, false, true, 52), "html", null, true);
                    yield "</span>";
                } else {
                    // line 54
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "text", [], "any", false, false, true, 54), "html", null, true);
                }
                // line 56
                yield "</li>
      ";
                // line 57
                if (((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "length", [], "any", false, false, true, 57) > 1) && CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, true, 57))) {
                    // line 58
                    yield "        </ul>
      </li>
      ";
                }
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
            // line 62
            yield "</ul>";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["links", "heading", "attributes", "loop"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/contrib/gin/templates/form/links--dropbutton.html.twig";
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
        return array (  138 => 62,  121 => 58,  119 => 57,  116 => 56,  113 => 54,  106 => 52,  104 => 51,  102 => 50,  100 => 49,  96 => 48,  91 => 45,  89 => 44,  72 => 43,  68 => 42,  60 => 39,  50 => 37,  48 => 36,  46 => 35,  44 => 34,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/contrib/gin/templates/form/links--dropbutton.html.twig", "/var/www/html/web/themes/contrib/gin/templates/form/links--dropbutton.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 34, "for" => 43];
        static $filters = ["escape" => 37];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                ['escape'],
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
