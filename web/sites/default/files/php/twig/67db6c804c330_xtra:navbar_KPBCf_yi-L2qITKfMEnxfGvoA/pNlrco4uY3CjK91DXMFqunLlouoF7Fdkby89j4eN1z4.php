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

/* xtra:navbar */
class __TwigTemplate_0048908ce2d6f2faec2f7456fe3174dc extends Template
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
            'branding' => [$this, 'block_branding'],
            'navbar_toggler' => [$this, 'block_navbar_toggler'],
            'left' => [$this, 'block_left'],
            'right' => [$this, 'block_right'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.xtra--navbar"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "xtra:navbar"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "xtra:navbar"));
        // line 19
        $context["nav_attributes"] = ((($context["nav_attributes"] ?? null)) ? ($context["nav_attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 20
        $context["navbar_container_attributes"] = ((($context["navbar_container_attributes"] ?? null)) ? ($context["navbar_container_attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 21
        yield "
";
        // line 22
        $context["placement"] = (((array_key_exists("placement", $context) &&  !(null === $context["placement"]))) ? ($context["placement"]) : (""));
        // line 23
        $context["navbar_expand"] = (((array_key_exists("navbar_expand", $context) &&  !(null === $context["navbar_expand"]))) ? ($context["navbar_expand"]) : ("lg"));
        // line 24
        $context["navbar_theme"] = (((array_key_exists("navbar_theme", $context) &&  !(null === $context["navbar_theme"]))) ? ($context["navbar_theme"]) : (null));
        // line 25
        yield "
";
        // line 27
        $context["navbar_container_classes"] = Twig\Extension\CoreExtension::merge([(((null ===         // line 28
($context["navbar_container_type"] ?? null))) ? ("container") : ("")), ((        // line 29
($context["navbar_container_type"] ?? null)) ? (("container" . ((($context["navbar_container_type"] ?? null)) ? (("-" . ($context["navbar_container_type"] ?? null))) : ("")))) : (""))], ((        // line 30
($context["navbar_container_utility_classes"] ?? null)) ? ($context["navbar_container_utility_classes"]) : ([])));
        // line 32
        yield "
";
        // line 34
        $context["nav_classes"] = Twig\Extension\CoreExtension::merge(["navbar", ((        // line 36
($context["navbar_expand"] ?? null)) ? (("navbar-expand-" . ($context["navbar_expand"] ?? null))) : ("")),         // line 37
($context["placement"] ?? null)], ((        // line 38
($context["navbar_utility_classes"] ?? null)) ? ($context["navbar_utility_classes"]) : ([])));
        // line 40
        yield "
";
        // line 41
        if (($context["navbar_theme"] ?? null)) {
            // line 42
            yield "  ";
            $context["nav_attributes"] = CoreExtension::getAttribute($this->env, $this->source, ($context["nav_attributes"] ?? null), "setAttribute", ["data-bs-theme", ($context["navbar_theme"] ?? null)], "method", false, false, true, 42);
        }
        // line 44
        yield "
<nav ";
        // line 45
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["nav_attributes"] ?? null), "addClass", [($context["nav_classes"] ?? null)], "method", false, false, true, 45), "html", null, true);
        yield ">
  <div ";
        // line 46
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["navbar_container_attributes"] ?? null), "addClass", [($context["navbar_container_classes"] ?? null)], "method", false, false, true, 46), "html", null, true);
        yield ">
    ";
        // line 47
        yield from $this->unwrap()->yieldBlock('branding', $context, $blocks);
        // line 50
        yield "
    ";
        // line 51
        yield from $this->unwrap()->yieldBlock('navbar_toggler', $context, $blocks);
        // line 56
        yield "
    <div class=\"collapse navbar-collapse\">
      ";
        // line 58
        yield from $this->unwrap()->yieldBlock('left', $context, $blocks);
        // line 61
        yield "
      ";
        // line 62
        yield from $this->unwrap()->yieldBlock('right', $context, $blocks);
        // line 65
        yield "    </div>
  </div>
</nav>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["navbar_container_type", "navbar_container_utility_classes", "navbar_utility_classes", "branding", "left", "right"]);        yield from [];
    }

    // line 47
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_branding(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 48
        yield "      ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["branding"] ?? null), "html", null, true);
        yield "
    ";
        yield from [];
    }

    // line 51
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_navbar_toggler(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 52
        yield "      <button class=\"navbar-toggler collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\".navbar-collapse\" aria-controls=\"navbar-collapse\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </button>
    ";
        yield from [];
    }

    // line 58
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_left(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 59
        yield "        ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["left"] ?? null), "html", null, true);
        yield "
      ";
        yield from [];
    }

    // line 62
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_right(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 63
        yield "        ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["right"] ?? null), "html", null, true);
        yield "
      ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "xtra:navbar";
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
        return array (  180 => 63,  173 => 62,  165 => 59,  158 => 58,  150 => 52,  143 => 51,  135 => 48,  128 => 47,  119 => 65,  117 => 62,  114 => 61,  112 => 58,  108 => 56,  106 => 51,  103 => 50,  101 => 47,  97 => 46,  93 => 45,  90 => 44,  86 => 42,  84 => 41,  81 => 40,  79 => 38,  78 => 37,  77 => 36,  76 => 34,  73 => 32,  71 => 30,  70 => 29,  69 => 28,  68 => 27,  65 => 25,  63 => 24,  61 => 23,  59 => 22,  56 => 21,  54 => 20,  52 => 19,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "xtra:navbar", "themes/custom/xtra/components/navbar/navbar.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 19, "if" => 41, "block" => 47];
        static $filters = ["merge" => 30, "escape" => 45];
        static $functions = ["create_attribute" => 19];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
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
