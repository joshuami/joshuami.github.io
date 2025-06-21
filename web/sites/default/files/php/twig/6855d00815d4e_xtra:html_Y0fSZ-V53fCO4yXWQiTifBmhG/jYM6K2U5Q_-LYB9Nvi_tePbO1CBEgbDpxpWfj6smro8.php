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

/* xtra:html */
class __TwigTemplate_fbb1105ae53c3de9f17668080a6db4ef extends Template
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
            'head_start' => [$this, 'block_head_start'],
            'head_end' => [$this, 'block_head_end'],
            'body_start' => [$this, 'block_body_start'],
            'body_end' => [$this, 'block_body_end'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.xtra--html"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "xtra:html"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "xtra:html"));
        // line 27
        $context["body_classes"] = Twig\Extension\CoreExtension::merge([(((($tmp =         // line 28
($context["root_path"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (("path-" . \Drupal\Component\Utility\Html::getClass(($context["root_path"] ?? null)))) : ("path-frontpage")), (((($tmp =         // line 29
($context["language"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (("language--" . \Drupal\Component\Utility\Html::getClass(($context["language"] ?? null)))) : (""))], ((        // line 30
($context["body_utility_classes"] ?? null)) ? ($context["body_utility_classes"]) : ([])));
        // line 32
        yield "
<!DOCTYPE html>
<html ";
        // line 34
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["html_attributes"] ?? null), "html", null, true);
        yield ">
  <head>
    ";
        // line 36
        yield from $this->unwrap()->yieldBlock('head_start', $context, $blocks);
        // line 39
        yield "    <head-placeholder token=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["placeholder_token"] ?? null), "html", null, true);
        yield "\">
    <title>";
        // line 40
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->safeJoin($this->env, ($context["head_title"] ?? null), " | "));
        yield "</title>
    <css-placeholder token=\"";
        // line 41
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["placeholder_token"] ?? null), "html", null, true);
        yield "\">
    <js-placeholder token=\"";
        // line 42
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["placeholder_token"] ?? null), "html", null, true);
        yield "\">
    ";
        // line 43
        yield from $this->unwrap()->yieldBlock('head_end', $context, $blocks);
        // line 46
        yield "  </head>
  <body ";
        // line 47
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["body_classes"] ?? null)], "method", false, false, true, 47), "html", null, true);
        yield " data-bs-theme=\"dark\">
    ";
        // line 48
        yield from $this->unwrap()->yieldBlock('body_start', $context, $blocks);
        // line 51
        yield "    ";
        // line 55
        yield "    <a href=\"#main-content\" class=\"visually-hidden focusable\">
      ";
        // line 56
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Skip to main content"));
        yield "
    </a>

    ";
        // line 59
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["page_top"] ?? null), "html", null, true);
        yield "
    ";
        // line 60
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["page"] ?? null), "html", null, true);
        yield "
    ";
        // line 61
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["page_bottom"] ?? null), "html", null, true);
        yield "

    <js-bottom-placeholder token=\"";
        // line 63
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["placeholder_token"] ?? null), "html", null, true);
        yield "\">
    ";
        // line 64
        yield from $this->unwrap()->yieldBlock('body_end', $context, $blocks);
        // line 67
        yield "  </body>
</html>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["root_path", "language", "body_utility_classes", "html_attributes", "placeholder_token", "head_title", "attributes", "page_top", "page", "page_bottom", "head_start", "head_end", "body_start", "body_end"]);        yield from [];
    }

    // line 36
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_head_start(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 37
        yield "      ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["head_start"] ?? null), "html", null, true);
        yield "
    ";
        yield from [];
    }

    // line 43
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_head_end(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 44
        yield "      ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["head_end"] ?? null), "html", null, true);
        yield "
    ";
        yield from [];
    }

    // line 48
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body_start(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 49
        yield "      ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["body_start"] ?? null), "html", null, true);
        yield "
    ";
        yield from [];
    }

    // line 64
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body_end(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 65
        yield "      ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["body_end"] ?? null), "html", null, true);
        yield "
    ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "xtra:html";
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
        return array (  186 => 65,  179 => 64,  171 => 49,  164 => 48,  156 => 44,  149 => 43,  141 => 37,  134 => 36,  126 => 67,  124 => 64,  120 => 63,  115 => 61,  111 => 60,  107 => 59,  101 => 56,  98 => 55,  96 => 51,  94 => 48,  90 => 47,  87 => 46,  85 => 43,  81 => 42,  77 => 41,  73 => 40,  68 => 39,  66 => 36,  61 => 34,  57 => 32,  55 => 30,  54 => 29,  53 => 28,  52 => 27,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "xtra:html", "themes/custom/xtra/components/html/html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 27, "block" => 36];
        static $filters = ["merge" => 30, "clean_class" => 28, "escape" => 34, "safe_join" => 40, "t" => 56];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block'],
                ['merge', 'clean_class', 'escape', 'safe_join', 't'],
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
