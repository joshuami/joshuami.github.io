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

/* radix:figure */
class __TwigTemplate_b0f307921804ac21ebd3d5827d8b32df extends Template
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
            'image' => [$this, 'block_image'],
            'caption' => [$this, 'block_caption'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.radix--figure"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "radix:figure"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "radix:figure"));
        // line 11
        $context["figure_classes"] = Twig\Extension\CoreExtension::merge(["figure", ((($context["align"] ?? null)) ? (("text-" . ($context["align"] ?? null))) : (""))], ((($context["figure_utility_classes"] ?? null)) ? ($context["figure_utility_classes"]) : ([])));
        // line 12
        yield "
";
        // line 13
        $context["figure_attributes"] = ((($context["figure_attributes"] ?? null)) ? ($context["figure_attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 14
        yield "
<figure ";
        // line 15
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["figure_attributes"] ?? null), "addClass", [($context["figure_classes"] ?? null)], "method", false, false, true, 15), "html", null, true);
        yield ">
  ";
        // line 16
        yield from $this->unwrap()->yieldBlock('image', $context, $blocks);
        // line 19
        yield "
  ";
        // line 20
        yield from $this->unwrap()->yieldBlock('caption', $context, $blocks);
        // line 27
        yield "</figure>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["align", "figure_utility_classes", "image", "caption"]);        yield from [];
    }

    // line 16
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_image(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 17
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["image"] ?? null), "html", null, true);
        yield "
  ";
        yield from [];
    }

    // line 20
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_caption(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 21
        yield "    ";
        if (($context["caption"] ?? null)) {
            // line 22
            yield "      <figcaption class=\"figure-caption\">
        ";
            // line 23
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["caption"] ?? null), "html", null, true);
            yield "
      </figcaption>
    ";
        }
        // line 26
        yield "  ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "radix:figure";
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
        return array (  112 => 26,  106 => 23,  103 => 22,  100 => 21,  93 => 20,  85 => 17,  78 => 16,  71 => 27,  69 => 20,  66 => 19,  64 => 16,  60 => 15,  57 => 14,  55 => 13,  52 => 12,  50 => 11,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "radix:figure", "themes/contrib/radix/components/figure/figure.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 11, "block" => 16, "if" => 21];
        static $filters = ["merge" => 11, "escape" => 15];
        static $functions = ["create_attribute" => 13];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block', 'if'],
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
