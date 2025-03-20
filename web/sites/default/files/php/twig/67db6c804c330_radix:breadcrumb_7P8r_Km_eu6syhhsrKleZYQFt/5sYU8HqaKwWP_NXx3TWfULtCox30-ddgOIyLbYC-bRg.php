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

/* radix:breadcrumb */
class __TwigTemplate_6e76bfa9ab1e8e8179ae61adcc0314eb extends Template
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
            'breadcrumb' => [$this, 'block_breadcrumb'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.radix--breadcrumb"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "radix:breadcrumb"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "radix:breadcrumb"));
        // line 11
        $context["breadcrumb_classes"] = Twig\Extension\CoreExtension::merge(["breadcrumb"], ((        // line 13
($context["breadcrumb_utility_classes"] ?? null)) ? ($context["breadcrumb_utility_classes"]) : ([])));
        // line 15
        $context["breadcrumb_attributes"] = ((($context["attributes"] ?? null)) ? ($context["attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 16
        yield "
";
        // line 17
        yield from $this->unwrap()->yieldBlock('breadcrumb', $context, $blocks);
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["breadcrumb_utility_classes", "attributes", "breadcrumb"]);        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_breadcrumb(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 18
        yield "  ";
        if (($context["breadcrumb"] ?? null)) {
            // line 19
            yield "    <nav aria-label=\"breadcrumb\">
      <ol ";
            // line 20
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["breadcrumb_attributes"] ?? null), "addClass", [($context["breadcrumb_classes"] ?? null)], "method", false, false, true, 20), "html", null, true);
            yield ">
        ";
            // line 21
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["breadcrumb"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 22
                yield "          <li class=\"breadcrumb-item ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((( !CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 22)) ? ("active") : ("")));
                yield "\">
            ";
                // line 23
                if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 23)) {
                    // line 24
                    yield "              <a href=\"";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 24), "html", null, true);
                    yield "\">";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "text", [], "any", false, false, true, 24), "html", null, true);
                    yield "</a>
            ";
                } else {
                    // line 26
                    yield "              ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "text", [], "any", false, false, true, 26), "html", null, true);
                    yield "
            ";
                }
                // line 28
                yield "          </li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            yield "      </ol>
    </nav>
  ";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "radix:breadcrumb";
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
        return array (  111 => 30,  104 => 28,  98 => 26,  90 => 24,  88 => 23,  83 => 22,  79 => 21,  75 => 20,  72 => 19,  69 => 18,  57 => 17,  54 => 16,  52 => 15,  50 => 13,  49 => 11,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "radix:breadcrumb", "themes/contrib/radix/components/breadcrumb/breadcrumb.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 11, "block" => 17, "if" => 18, "for" => 21];
        static $filters = ["merge" => 13, "escape" => 20];
        static $functions = ["create_attribute" => 15];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block', 'if', 'for'],
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
