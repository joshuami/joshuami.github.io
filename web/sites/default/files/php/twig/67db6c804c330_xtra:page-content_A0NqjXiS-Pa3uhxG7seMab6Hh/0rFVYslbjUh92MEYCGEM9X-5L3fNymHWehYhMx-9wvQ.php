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

/* xtra:page-content */
class __TwigTemplate_204e76074838b50b7e2d020ca69770b6 extends Template
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
            'page_inner_content' => [$this, 'block_page_inner_content'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.xtra--page-content"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "xtra:page-content"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "xtra:page-content"));
        // line 2
        $context["page_main_classes"] = Twig\Extension\CoreExtension::merge([], ((        // line 3
($context["page_main_utility_classes"] ?? null)) ? (($context["page_main_utility_classes"] ?? null)) : ([])));
        // line 5
        yield "
";
        // line 7
        $context["header_classes"] = ["page__header", "container-fluid"];
        // line 13
        yield "
<main";
        // line 14
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [($context["page_main_classes"] ?? null)], "method", false, false, true, 14), "html", null, true);
        yield " id=\"main-content\">
  ";
        // line 18
        yield "  ";
        $context["preheader_render"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "preheader", [], "any", false, false, true, 18));
        // line 19
        yield "  ";
        if (Twig\Extension\CoreExtension::trim(($context["preheader_render"] ?? null))) {
            // line 20
            yield "    <div class=\"page__preheader\">
      <div class=\"container-fluid bg-faded-gray\">
        <div class=\"container\">
          ";
            // line 23
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["preheader_render"] ?? null), "html", null, true);
            yield "
        </div>
      </div>
    </div>
  ";
        }
        // line 28
        yield "  ";
        $context["header_render"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 28));
        // line 29
        yield "  ";
        if (Twig\Extension\CoreExtension::trim(($context["header_render"] ?? null))) {
            // line 30
            yield "    <header";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["header_classes"] ?? null)], "method", false, false, true, 30), "html", null, true);
            yield "\">
      <div class=\"container\">
        <div class=\"row align-items-center\">
          <div class=\"col py-4\">
            ";
            // line 34
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["header_render"] ?? null), "html", null, true);
            yield "
          </div>
          ";
            // line 36
            $context["featured_image_render"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "featured_image", [], "any", false, false, true, 36));
            // line 37
            yield "          ";
            if (Twig\Extension\CoreExtension::trim(($context["featured_image_render"] ?? null))) {
                // line 38
                yield "          <div class=\"col col-md-6\">
            ";
                // line 39
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["featured_image_render"] ?? null), "html", null, true);
                yield "
          </div>
          ";
            }
            // line 42
            yield "        </div>
      </div>
    </header>
  ";
        }
        // line 46
        yield "  <div class=\"container\">
    <div class=\"row\">
      ";
        // line 48
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 48)) {
            // line 49
            yield "        <div class=\"page__content col\">
            ";
            // line 50
            yield from $this->unwrap()->yieldBlock('page_inner_content', $context, $blocks);
            // line 53
            yield "        </div>
      ";
        }
        // line 55
        yield "      ";
        // line 57
        yield "      ";
        $context["sidebar_render"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar", [], "any", false, false, true, 57));
        // line 58
        yield "      ";
        if (Twig\Extension\CoreExtension::trim(($context["sidebar_render"] ?? null))) {
            // line 59
            yield "        <div class=\"page__sidebar col-md-12 col-lg-4\">
          ";
            // line 60
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["sidebar_render"] ?? null), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 63
        yield "    </div>
  </div>
</main>";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page_main_utility_classes", "content_attributes", "page", "attributes"]);        yield from [];
    }

    // line 50
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_inner_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 51
        yield "              ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 51), "html", null, true);
        yield "
            ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "xtra:page-content";
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
        return array (  169 => 51,  162 => 50,  154 => 63,  148 => 60,  145 => 59,  142 => 58,  139 => 57,  137 => 55,  133 => 53,  131 => 50,  128 => 49,  126 => 48,  122 => 46,  116 => 42,  110 => 39,  107 => 38,  104 => 37,  102 => 36,  97 => 34,  89 => 30,  86 => 29,  83 => 28,  75 => 23,  70 => 20,  67 => 19,  64 => 18,  60 => 14,  57 => 13,  55 => 7,  52 => 5,  50 => 3,  49 => 2,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "xtra:page-content", "themes/custom/xtra/components/page-content/page-content.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 2, "if" => 19, "block" => 50];
        static $filters = ["merge" => 3, "escape" => 14, "render" => 18, "trim" => 19];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['merge', 'escape', 'render', 'trim'],
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
